<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\CourseEnrollment;
use App\Models\Courses;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * User Dashboard page Controller
     */

    public function Dashboard()
    {
        $user_id = session('User');
        $user = User::where('id', '=', $user_id)->first();
        $courses_enrolled = CourseEnrollment::where('user_id', $user_id)->count();

        return view('Users.dashboard', [
            'courses_enrolled' => $courses_enrolled,
        ])->with('user', $user);
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
