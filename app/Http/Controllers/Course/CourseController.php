<?php

namespace App\Http\Controllers\Course;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function createCourseContent(Request $request) 
    {
        return dd($request->all());
    }
}
