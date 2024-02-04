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
            'content_url' => 'string',
            'course_file' =>  'mimes:pdf,ppt'
        ]);




        $course_file_name = time() . '-' . $request->course_id . '.' . $request->course_file->extension();
        $request->course_file->move(public_path('course_file'), $course_file_name);

        CourseContent::create([
            'courses_id' => $request->course_id,
            'content_type' => $request->content_type,
            'content_url' => $request->content_url ?? $course_file_name
        ]);

        return redirect(route('tutorSingleCourse', $request->course_id))->with('');
    }
}
