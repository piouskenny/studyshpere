<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use App\Models\Courses;
use App\Models\Tutor;
use Illuminate\Http\Request;
use tidy;

class TutorController extends Controller
{
    public function dashboard()
    {
        $tutor = Tutor::find(session('Tutor'))->first();

        $courses = Courses::where('tutor_id', $tutor->id)->get();
        $courseCount = $tutor->courses()->count();

        return view(
            'Tutor.dashboard',
            [
                'course' => $courseCount,
                'courses' => $courses,
            ]
        )->with('tutor', $tutor);
    }


    public function createCourse()
    {
        $tutor = Tutor::where('id', '=', session('Tutor'))->first();
        return view('Tutor.CreateCourse')->with('tutor', $tutor);
    }


    /**
     * Course Creation method
     */
    public function storeCourse(Request $request)
    {
        $request->validate([
            'course_name' => 'string',
            'course_type' => 'string',
            'tutor' => 'integer',
            'course_image' => 'required|mimes:png,jpg,jpeg|max:3072'
        ]);

        $course_image_name = time() . '-' . $request->course_name . '.' . $request->course_image->extension();

        $request->course_image->move(public_path('course_img'), $course_image_name);

        $course = Courses::create([
            'course_name' => $request->course_name,
            'course_type' => $request->course_type,
            'tutor_id' => $request->tutor,
            'course_image' => $course_image_name
        ]);

        return redirect(route('tutor_dashboard'))->with('success', 'course created successfully');
    }
}
