<?php

namespace App\Http\Controllers\Course;

use App\Http\Controllers\Controller;
use App\Models\Courses;
use App\Models\User;
use Illuminate\Http\Request;

class EnrollController extends Controller
{
    public function __invoke($course_id)
    {
        $user = User::where('id', '=', session('User'))->first();

        if (!$user) {
            return redirect(route('login_page'));
        }
        dd($course_id);
    }
}
