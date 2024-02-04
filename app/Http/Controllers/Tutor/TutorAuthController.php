<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use App\Models\Tutor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TutorAuthController extends Controller
{
    public function signup()
    {
        return view('Tutor.signup');
    }


    public function create(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'username' => 'required|string',
            'email' => 'required|email|unique:users',
            'phonenumber' => 'required|string|unique:users',
            'password' => 'required|string|min:8',
        ]);


        $user = Tutor::create([
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


    public function logout()
    {
        $tutorInfo = session()->pull('Tutor');
        Auth::logout();
        return redirect(route('login_page'));
    }
}
