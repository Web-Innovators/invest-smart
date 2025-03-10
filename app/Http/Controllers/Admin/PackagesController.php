<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\UserAsset;
use App\Models\SharePrice;
use App\Models\UserDeposit;
use App\Models\SharePackage;
use Illuminate\Http\Request;
use App\Models\UserWithdrawl;
use App\Jobs\ProcessVideoUpload;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PackagesController extends Controller
{
    public function updateStatusWithdraws(Request $request)
    {
        $request->validate([
            'withdraw_id' => 'required|integer',
            'status' => 'required|in:approved,declined'
        ]);
        $withdraw = UserWithdrawl::find($request->withdraw_id);
        // dd($withdraw);
        if ($withdraw) {
            $withdraw->status = $request->status;
            $withdraw->save();
            // update user assets
            $userAssets = UserAsset::where('user_id', $withdraw->user_id)->first();
            $userAssets->withdraw_shares = $withdraw->share_withdrawl_requested;
            // dd($userAssets,$withdraw);
            $userAssets->save();
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false], 400);
    }

    public function updateStatusDeposits(Request $request)
    {
        $request->validate([
            'deposit_id' => 'required|integer',
            'status' => 'required|in:approved,declined'
        ]);
        $deposit = UserDeposit::find($request->deposit_id);
        // dd($deposit);
        if ($deposit) {
            $deposit->status = $request->status;
            $deposit->save();
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false], 400);
    }

    public function shareUpdate(Request $request)
    {
        // // Validate form data
        $request->validate([
            'share_id' => 'required|integer|exists:share_prices,id', // Ensure it exists in SharePrice table
            'total_shares' => 'required|integer',
            'share_price' => 'required|integer',
        ]);
        // dd($request->all());

        // Update share price
        $share = SharePrice::findOrFail($request->share_id);
        $share->total_shares = $request->total_shares;
        $share->share_price = $request->share_price;
        $share->save(); // Save share price update

        // Update all packages' prices based on new share price
        $pkgs = SharePackage::all();
        foreach ($pkgs as $pkg) {
            $pkg->pkg_price = $pkg->pkg_shares * $request->share_price;
            $pkg->save(); // Save each package
        }
        return redirect()->back()->with('success', 'Shares Price Updated Successfully!');
    }

    public function packagePost(Request $request)
    {
        // Define the range of package shares (from 50 to 50000, increasing by 50)
        // $packages = [];
        // // dd($request->all());
        // $sharePrice = SharePrice::first(); // Get the single share price
        // $shares = [1, 5, 10, 20, 50, 100, 150, 200, 300, 400, 600, 800, 1000, 1500, 2000, 3000, 4000, 5000];
        // $packages = [];
        // foreach ($shares as $share) {
        //     $packages[] = [
        //         'pkg_shares' => $share,
        //         'pkg_price'  => $share * $sharePrice->share_price, // Calculate price
        //         'pkg_monthly_roi' => 10,  // Nullable field
        //         'pkg_bonus_roi' => 'Surprise', // Default value
        //         'pkg_referral_bonus' => 5,  // Nullable field
        //         'pkg_daily_referral_roi' => 10,  // Nullable field
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ];
        // }
        // // Insert all packages at once
        // SharePackage::insert($packages);
        // return redirect()->back()->with('success', 'All packages added successfully!');

        // Validate form data
        $request->validate([
            'pkg_shares' => 'required|string',
            'pkg_monthly_roi' => 'nullable|string',
            'pkg_bonus_roi' => 'nullable|string',
            'pkg_referral_bonus' => 'nullable|string',
            'pkg_daily_referral_roi' => 'nullable|string',
        ]);
        $sharePrice = SharePrice::first(); // Get the single share price
        // Save to database
        $pkg = new SharePackage();
        $pkg->pkg_shares = $request->pkg_shares;
        $pkg->pkg_price = $pkg->pkg_shares * $sharePrice->share_price;
        $pkg->pkg_monthly_roi = $request->pkg_monthly_roi;
        $pkg->pkg_bonus_roi = $request->pkg_bonus_roi ?? 'Surprise'; // Default value
        $pkg->pkg_referral_bonus = $request->pkg_referral_bonus;
        $pkg->pkg_daily_referral_roi = $request->pkg_daily_referral_roi;
        $pkg->save();
        return redirect()->back()->with('success', 'Package added successfully!');
    }

    public function packageUpdate(Request $request)
    {
        // // Validate form data
        $request->validate([
            'pkg_id' => 'required|integer|exists:share_packages,id',
            'pkg_shares' => 'required|string',
            'pkg_monthly_roi' => 'nullable|string',
            'pkg_bonus_roi' => 'nullable|string',
            'pkg_referral_bonus' => 'nullable|string',
            'pkg_daily_referral_roi' => 'nullable|string',
        ]);
        $sharePrice = SharePrice::first(); // Get the single share price
        // Find and update package
        $pkg = SharePackage::findOrFail($request->pkg_id);
        $pkg->pkg_shares = $request->pkg_shares;
        $pkg->pkg_price = $pkg->pkg_shares * $sharePrice->share_price;
        $pkg->pkg_monthly_roi = $request->pkg_monthly_roi;
        $pkg->pkg_bonus_roi = $request->pkg_bonus_roi ?? 'Surprise'; // Default value
        $pkg->pkg_referral_bonus = $request->pkg_referral_bonus;
        $pkg->pkg_daily_referral_roi = $request->pkg_daily_referral_roi;
        $pkg->save();

        return redirect()->back()->with('success', 'Package updated successfully!');
    }

    public function deletePackage(Request $request)
    {
        $package = SharePackage::find($request->pkg_id);

        if ($package) {
            $package->delete();
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false, 'message' => 'Package not found']);
        }
    }

    public function banUser(Request $request)
    {
        $user = User::find($request->user_id);

        if ($user) {
            $user->status = $request->status; // Set status to 'banned' or 'approved'
            $user->save();

            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false, 'message' => 'User not found']);
        }
    }

    public function adminQueueVideo(Request $request)
    {
        $request->validate([
            'video_file' => 'required|file|mimes:mp4,mov,avi,mkv|max:204800', // Max 200MB
        ]);

        $file = $request->file('video_file');
        $filePath = $file->store('uploads/videos', 'local');
        $fileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);

        // Dispatch Job to Process Video
        ProcessVideoUpload::dispatch($filePath, $fileName);

        return response()->json(['message' => 'Video is being processed.']);
    }
}
