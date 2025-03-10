<?php

namespace App\Http\Controllers\Auth;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Events\UserRegistered;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function registerPage()
    {
        return view('users.pages.auth.signup');
    }

    public function loginPage()
    {
        return view('users.pages.auth.login');
    }

    public function forgotPage()
    {
        return view('users.pages.auth.forgot');
    }

    public function resetPage($token)
    {
        return view('users.pages.auth.reset', compact('token'));
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|min:8',
            'referral' => 'required',
        ]);
        // dd($request->all());
        // Check if the email already exists
        $existingUser = User::where('email', $request->input('email'))->first();
        if ($existingUser) {
            // Alert::info('Information !', 'The email address is already registered.');
            return redirect()->back()->with('info', 'The email address is already registered.');
        }
        // Create a new product instance
        $user = new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->referral_code = $validatedData['referral'];
        $user->password = Hash::make($validatedData['password']);
        // if ($request->hasFile('profile')) {
        //     $file = $request->profile;
        //     $fileName = time() . '_' . $file->getClientOriginalName();
        //     $file->move(public_path('uploads/users/'), $fileName);
        //     $user->profile = $fileName;
        // }
        // Fire event
        event(new UserRegistered($user));
        // dd($user);
        // Save the user to the database
        $user->save();

        return redirect()->route('login.get')->with('success', 'Account created successfully');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required | email | exists:users',
            'password' => 'required'
        ]);
        // dd($request->all());
        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard.get');
        }
        // Alert::error('Not Found!', 'Record not matched with data !!!');
        return back()->with('message', 'Record not matched with data !!!');
    }

    public function forgot(Request $request)
    {
        // dd(0);
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users',
        ]);
        if ($validator->fails()) {
            // Alert::warning('Information!', 'Please enter your email and password !!!');
            return back()->with('warning', 'Please enter your email and password !!!');
        }
        $token = mt_rand(100000, 999999);
        DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);
        Mail::send('emails.forgot-password', ['token' => $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Reset Password Link');
        });
        // Alert::success('Success', 'Successfully send the reset password link on your email please check to verify !!!');
        return back()->with('success', 'Password link send to email !!!');
    }

    public function reset(Request $request)
    {
        $request->validate([
            'email' => 'required | email | exists:users',
            'password' => 'required | min:8 | same:password',
            'new_password' => 'required'
        ]);

        $updatePassword = DB::table('password_reset_tokens')
            ->where([
                'email' => $request->email,
                'token' => $request->token
            ])->first();

        if (!$updatePassword) {
            // Alert::error('Ooops', 'Something went wrong , password not updated !!!');
            return back()->with('warning', 'Something went wrong , password not updated !!!');
        }

        $user = User::where('email', $request->email)
            ->update(['password' => Hash::make($request->password)]);
        DB::table('password_reset_tokens')->where(['email' => $request->email])->delete();
        // Alert::success('Success', 'Successfully update password !!!');
        return redirect()->route('login.get')->with('success', 'Successfully update password  !!!');
    }

    public function logout()
    {
        Auth::logout();
        // Alert::success('Success', 'Logout successfully !!!');
        return redirect()->route('login.get')->with('success', "Logout successfully!");
    }
}
