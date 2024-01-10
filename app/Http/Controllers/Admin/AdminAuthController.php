<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        
    }



    /**
     * Admin Login page and functionality
     */
    public  function login()
    {
        return view('Admin.login');
    }

    public function check()
    {
    }
}
