<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Contact;
use App\Models\Membership;
use App\Models\ModelDetail;
use App\Models\UserDeposit;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ProfileDetail;
use App\Models\UserWithdrawl;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\UserAsset;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class QueryController extends Controller
{
    public function storeQuery(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);
        // Create a new contact entry
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->save();
        // Redirect or return response
        return redirect()->back()->with('success', 'Query submitted successfully!');
    }

    public function profileInfoStore(Request $request)
    {
        if (!Auth::user()) {
            return back()->with('error', 'Please login or create an account first!');
        }

        // Validate the request data
        $validator = Validator::make($request->all(), [
            'wallet_address' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $profile = ProfileDetail::where('user_id', Auth::id())->first();
        if ($profile) {
            // Update existing record
            $profile->TRC20_address = $request->wallet_address;
            $profile->save();
            return back()->with('success', 'Wallet address updated successfully.');
        } else {
            // Create a new record
            $profile = new ProfileDetail();
            $profile->user_id = Auth::id();
            $profile->TRC20_address = $request->wallet_address;
            $profile->email = Auth::user()->email;
            $profile->save();
            return back()->with('success', 'Wallet address saved successfully.');
        }
    }

    public function pkgPaymentPost(Request $request)
    {
        if (!Auth::user()) {
            return back()->with('error', 'You have to first create an account for buying shares!');
        }
        // Validate required fields
        $validatedData = $request->validate([
            'pkg_id' => 'required|integer',
            'pkg_shares' => 'required|integer',
            'pkg_amount' => 'required|numeric',
            'payment_ss' => 'required', // Allow null
        ]);
        // Create a new deposit record
        $payment = new UserDeposit();
        $payment->user_id = auth()->id();
        $payment->pkg_id = $validatedData['pkg_id'];
        $payment->pkg_shares = $validatedData['pkg_shares'];
        $payment->pkg_amount = $validatedData['pkg_amount'];
        $payment->transaction_id = auth()->id() . '_' . Str::random(10);
        $payment->payment_ss = $validatedData['payment_ss'];
        $payment->status = 'pending';
        // Handle payment screenshot upload
        if ($request->hasFile('payment_ss')) {
            $file = $request->payment_ss;
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/payments/'), $fileName);
            $payment->payment_ss = $fileName;
        }
        $payment->save();
        // If no record exists, create a new one
        $userAsset = new UserAsset();
        $userAsset->user_id = auth()->id();
        $userAsset->deposits_shares = $validatedData['pkg_shares'];
        $userAsset->save();

        return back()->with('success', 'Deposit successfully!');
    }


    public function shareWithdrawRequest(Request $request, $id)
    {
        if (!Auth::check()) {
            return back()->with('error', 'You have to first create an account to withdraw shares!');
        }
        // Fetch the approved deposit
        $approvedDeposit = UserDeposit::where('id', $id)
            ->where('user_id', auth()->id())
            ->where('status', 'approved') // Only allow if status is 'approved'
            ->first();

        if (!$approvedDeposit) {
            return back()->with('error', 'Withdrawal request denied! Your deposit is not approved.');
        }

        // Check if a withdrawal request for this deposit ID already exists
        $existingWithdraw = UserWithdrawl::where('user_id', auth()->id())
            ->where('deposit_id', $id) // Ensure the same deposit is not withdrawn again
            ->exists();
        if ($existingWithdraw) {
            return back()->with('error', 'This deposit has already been withdrawn.');
        }
        // Create a new withdrawal record
        $withdraw = new UserWithdrawl();
        $withdraw->user_id = auth()->id();
        $withdraw->deposit_id = $id; // Store deposit ID to prevent duplicate withdrawals
        $withdraw->share_withdrawl_requested = $approvedDeposit->pkg_shares;
        $withdraw->status = 'pending';
        $withdraw->save();
        return back()->with('success', 'Withdrawal request submitted successfully!');
    }
}
