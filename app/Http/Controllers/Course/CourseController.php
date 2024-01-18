<?php

namespace App\Http\Controllers\Course;

use App\Http\Controllers\Controller;
use App\Models\CourseContent;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function createCourseContent(Request $request)
    {
        $request->validate([
            'course_id' => 'required|integer',
            'content_type' => 'required|string',
            'content_url' => 'required|string',
        ]);

        CourseContent::create([
            'courses_id' => $request->course_id,
            'content_type' => $request->content_type,
            'content_url' => $request->content_url
        ]);

        return redirect(route('tutorSingleCourse', $request->course_id))->with('');
    }
}
