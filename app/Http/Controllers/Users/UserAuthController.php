<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserAuthRequest;
use App\Models\OTP;
use App\Models\Tutor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Services\ThirdPartyApi\Sendchampopt;
use App\Classes\EmailClass;

class UserAuthController extends Controller
{
    public function signup()
    {
        return view('Users.signup');
    }

    public function create(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'phonenumber' => 'required|string|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $user = User::create([
            'full_name' => $request->full_name,
            'username' => $request->username,
            'email' => $request->email,
            'phonenumber' => $request->phonenumber,
            'password' => Hash::make($request->password),
        ]);

        /*
        |--------------------------------------------------------------------------
        | store user in otp table
        |--------------------------------------------------------------------------
        */
        $user_otp = random_int(100000, 999999);

        OTP::create([
            'user_id' => $user->id,
            'otp' => $user_otp,
        ]);

        /**
         * Send OTP to email
        */
        try {
            $emailClass = new EmailClass($user_otp, $user->email);

            return redirect(route('verify_otp_page'))->with('user', $user);

        } catch (\Exception $e) {
            return redirect(route('login_page'))->with('da', 'sorry unable to get your OTP at the moment');
        }
    }


    public function login()
    {
        return view('Users.login');
    }


    public function verify_otp_page()
    {
        $user = session('user');
        return view('Users.verify_otp')->with('user', $user);
    }


    public function verify_otp(Request $request)
{
    $request->validate([
        'otp' => 'required|min:6|numeric',
        'id' => 'required|integer'
    ]);

    $user = User::find($request->id);

    if (!$user) {
        return back()->with('failed', 'User not found. Check your OTP and try again.')
                     ->withInput($request->except('otp'));
    }

    // Retrieve the OTP for the user
    $otp = OTP::where('user_id', $request->id)->first();

    // Check if the OTP matches
    if (!$otp || $otp->otp != $request->otp) {
        return back()->with('failed', 'Invalid OTP')
                     ->withInput($request->except('otp'));
    }

    // Delete the OTP record
    $otp->delete();

    // Store the user ID in the session
    $request->session()->put('User', $user->id);

    // Redirect to the dashboard with a success message
    return redirect(route('dashboard'))->with([
        'user' => $user,
        'success' => 'User OTP has been verified successfully',
    ]);
}


    public function check(Request $request)
    {
        $request->validate(
            [
                'phonenumber' => 'required|numeric|min:11',
                'password' => 'required'
            ]
        );

        $updated_numnber = ltrim($request->phonenumber, '0');

        $user = User::where('phonenumber', $updated_numnber)->first();


        if ($user) {
            if (Hash::check($request->password, $user->password,)) {
                $request->session()->put('User', $user->id);
                return redirect(route('dashboard'))->with('user', $user);
            } else {
                return back()->with('failed', 'wrong Password');
            }
        } else {
            $tutor = Tutor::where('phonenumber', $updated_numnber)->first();
            if ($tutor) {
                if (Hash::check($request->password, $tutor->password,)) {
                    $request->session()->put('Tutor', $tutor->id);

                    return redirect(route('tutor_dashboard'))->with('tutor', $tutor);
                } else {
                    return back()->with('failed', 'wrong Password');
                }
            }
        }
        return back()->with("failed", "No account found for $request->email");
    }


    public function logout()
    {
        $userInfo = session()->pull('User');
        Auth::logout();
        return redirect(route('login_page'));
    }
}
