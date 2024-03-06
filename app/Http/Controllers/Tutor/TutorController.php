<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use App\Models\Assesment;
use App\Models\CourseContent;
use App\Models\CourseEnrollment;
use App\Models\Courses;
use App\Models\Feedback;
use App\Models\Tutor;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use tidy;

class TutorController extends Controller
{
    public function dashboard()
    {
        $tutor = Tutor::find(session('Tutor'));

        $courses = Courses::where('tutor_id', $tutor->id)->get();
        $courseCount = $tutor->courses()->count();

        $assessments = Assesment::where('tutor_id', session('Tutor'))->get();

        return view(
            'Tutor.dashboard',
            [
                'course' => $courseCount,
                'courses' => $courses,
                'assessments' => $assessments,
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
            'course_type' => 'required',
            'description' => 'required',
            'tutor' => 'integer',
            'course_image' => 'required|mimes:png,jpg,jpeg|max:3072'
        ]);


        $course_image_name = time() . '-' . $request->course_name . '.' . $request->course_image->extension();

        $request->course_image->move(public_path('course_img'), $course_image_name);

        $course = Courses::create([
            'course_name' => $request->course_name,
            'course_type' => $request->course_type,
            'description'  => $request->description,
            'tutor_id' => $request->tutor,
            'course_image' => $course_image_name
        ]);

        return redirect(route('tutor_dashboard'))->with('success', 'course created successfully');
    }


    /**
     * See List of student that enrolled for your course
     */
    public function students()
    {
        $tutor_id =  session('Tutor');
        $tutor = Tutor::where('id', $tutor_id)->first();

        $courses_enrollment_list = CourseEnrollment::where('tutor_id', $tutor_id)->get();

        $students = [];

        /**
         * Get all the students data that has enrolled for your course
         */
        foreach ($courses_enrollment_list as $student) {
            $studentModel = User::where('id', $student->user_id)->first();
            if ($studentModel) {
                $students[] = $studentModel;
            }
        }

        return view(
            'Tutor.students',
            [
                'students' => $students,
            ]
        )->with('tutor', $tutor);
    }


    public function createCourseContent($id)
    {
        $course = Courses::find($id);

        $tutor = Tutor::where('id', '=', session('Tutor'))->first();
        return view(
            'Tutor.createCourseContent',
            [
                'course' => $course
            ]
        )->with('tutor', $tutor);
    }

    public function singleCourse($course_id)
    {
        $tutor = Tutor::where('id', '=', session('Tutor'))->first();
        $course = Courses::find($course_id);

        $courseContent = CourseContent::where('courses_id', $course_id)->get();



        return view(
            'Tutor.singleCourse',
            [
                'course' => $course,
                'courseContent' => $courseContent
            ]
        )->with('tutor', $tutor);
    }

    /**
     *View all feedbacks sent to this specific admin
     */
    public function feedbacks()
    {
        $tutor = Tutor::where('id', '=', session('Tutor'))->first();
        $feedbacks = Feedback::where('tutor_id', session('Tutor'))->paginate(5)->get();

        return view(
            'Tutor.feedbacks',
            [
                'feedbacks' => $feedbacks,
            ]
        )->with('tutor', $tutor);
    }

    public function createAssessmentPage($id)
    {
        $course = Courses::find($id);

        $tutor = Tutor::where('id', '=', session('Tutor'))->first();

        return view(
            'Tutor.addAssesment',
            [
                'course' => $course
            ]
        )->with('tutor', $tutor);
    }


    public function createAssesment(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'tutor_id' => 'required|exists:tutors,id',
            'question' => 'required',
            'correct_answer' => 'required',
            'option_a' => 'required',
            'option_b' => 'required',
            'option_c' => 'required',
        ]);


        $create_assement =  Assesment::create([
            'course_id' => $request->course_id,
            'tutor_id' => $request->tutor_id,
            'question' => $request->question,
            'correct_answer' => $request->correct_answer,
            'option_a' => $request->option_a,
            'option_b' => $request->option_b,
            'option_c' => $request->option_c
        ]);

        return back()->with('success', 'assessment created successfully');
    }


    public function updateAssessmentPage($assessmentId)
    {
        $assesment = Assesment::find($assessmentId);

        $tutor = Tutor::where('id', '=', session('Tutor'))->first();

        return view(
            'Tutor.updateAssessment',
            [
                'assessment' => $assesment,
            ]
        )->with('tutor', $tutor);;
    }


    public function updateAssessment(Request $request)
    {
        $request->validate(
            [
                'course_id' => 'required|exists:courses,id',
                'tutor_id' => 'required|exists:tutors,id',
                'question' => 'required',
                'correct_answer' => 'required',
                'option_a' => 'required',
                'option_b' => 'required',
                'option_c' => 'required'
            ]
        );

        $assessment = Assesment::find($request->id);

        $assessment->update([
            'course_id' => $request->course_id,
            'tutor_id' => $request->tutor_id,
            'question' => $request->question,
            'correct_answer' => $request->correct_answer,
            'option_a' => $request->option_a,
            'option_b' => $request->option_b,
            'option_c' => $request->option_c
        ]);


        return redirect(route('tutor_dashboard'))->with('success', 'assessment updated successfully');
    }


    public function delete_assessment($id)
    {
        Assesment::destroy($id);


        return redirect(route('tutor_dashboard'))->with('success', 'assessment deleted successfully');
    }

    public function logoutPage()
    {
        $tutor = Tutor::where('id', '=', session('Tutor'))->first();

        return view('Tutor.logout')->with('tutor', $tutor);
    }
}
