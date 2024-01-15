<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserAuthRequest;
use App\Models\Tutor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

        return view(
            'Users.verify_otp',
        )->with('user', $user);
    }

    public function login()
    {
        return view('Users.login');
    }


    public function verify_otp_page()
    {
        return view('Users.verify_otp');
    }

    public function verify_otp(Request $request)
    {
        $request->validate([
            'otp' => 'required|min:4|numeric'
        ]);

        // check if OTP is valid

        $user = User::where('id', $request->id)->first();


        if (!$user) {
            return back()->with('danger', 'user not found');
        }
        $request->session()->put('User', $user->id);
        return redirect(route('dashboard'))->with('user', $user);
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
                    return redirect(route('tutor_dashboard'))->with('user', $user);
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
