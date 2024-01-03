<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function courses()
    {
        $courses = Courses::all();

        return view(
            'courses',
            [
                'courses' => $courses,
            ]
        );
    }
}
