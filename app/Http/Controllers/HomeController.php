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
        $courses = Courses::paginate(8);

        return view(
            'courses',
            [
                'courses' => $courses,
            ]
        );
    }

    public function singleCourse($id)
    {
        $course = Courses::find($id);

        return view(
            'course'
        )->with('course', $course);
    }
}
