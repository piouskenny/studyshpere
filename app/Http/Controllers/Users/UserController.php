<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * User Dashboard page Controller
     */

    public function Dashboard()
    {
        $user = User::where('id', '=', session('User'))->first();
        return view('Users.dashboard')->with('user', $user);
    }



    /**
     * User Profile Page
     */

    public function Profile()
    {
        $user = User::where('id', '=', session('User'))->first();

        return view('Users.profile')->with('user', $user);
    }
}
