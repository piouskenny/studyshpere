<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    /**
     * Admin signup page and functionality
     */
    public function signup()
    {
        return view('Admin.signup');
    }

    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required | string | unique:admins',
            'email' => 'required | email | unique:admins',
            'phonenumber' => 'required| unique:admins',
            'password' => 'required | min:8'
        ]);

        $admin = Admin::create([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'phonenumber' => $request->phonenumber,
            'password' => Hash::make($request->password)
        ]);

        return view('Admin.login')->with('success', 'Admin Created Successfully');
    }


    /**
     * Admin Login page and functionality
     */
    public  function login()
    {
        return view('Admin.login');
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

        $admin = Admin::where('phonenumber', $updated_numnber)->first();


        if ($admin) {
            if (Hash::check($request->password, $admin->password,)) {
                $request->session()->put('Admin', $admin->id);
                return redirect(route('admin_dashboard'))->with('admin', $admin);
            } else {
                return back()->with('failed', 'wrong Password');
            }
        }

        return back()->with("failed", "No account found for $request->phonenumber");
    }
}
