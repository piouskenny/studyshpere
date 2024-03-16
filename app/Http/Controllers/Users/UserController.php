<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\AssementQuestionScore;
use App\Models\Assesment;
use App\Models\CourseCompleted;
use App\Models\CourseContent;
use App\Models\CourseEnrollment;
use App\Models\CourseLearningProgress;
use App\Models\Courses;
use App\Models\Feedback;
use App\Models\Tutor;
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
        $courses_enrollment = CourseEnrollment::where('user_id', $user_id)->get();
        $courses = [];

        foreach ($courses_enrollment as $course) {
            $courseModel = Courses::where('id', $course->course_id)->first();
            if ($courseModel) {
                $courses[] = $courseModel;
            }
        }

        $courses_enrolled = count($courses);

        return view('Users.dashboard', [
            'courses_enrolled' => $courses_enrolled,
            'courses' => $courses,
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




    /**
     * View of all the avaliable courses
     *
     */
    public function all_courses()
    {
        $user = User::where('id', '=', session('User'))->first();
        $courses = Courses::paginate(6);

        return view(
            'Users.courses',
            [
                'courses' => $courses,
            ]
        )->with('user', $user);
    }



    /**
     * signle course detials
     */

    public function view_course($id)
    {
        $user = User::where('id', '=', session('User'))->first();
        $course = Courses::find($id);

        return view(
            'Users.coursedetails',
            [
                'course' => $course
            ]
        )->with('user', $user);
    }


    /**
     * User can view their signle course detials
     *
     */

    public function singleCourse($course_id)
    {
        $user = User::where('id', '=', session('User'))->first();
        $course = Courses::find($course_id);

        $courseContent = CourseContent::where('courses_id', $course_id)->get();
        $tutor = Tutor::where('id', $course->tutor_id)->first();

        $assessments = Assesment::where('course_id', $course_id)->get();

        $courseCompleted = CourseCompleted::where('courses_id', $course_id)->first();

        if ($courseCompleted == null) {
            $status = false;
        } else if ($courseCompleted->completed == true) {
            $status = true;
        } else {
            $status = false;
        }


        //        check if user already take the assessment
        $user_score = AssementQuestionScore::where('user_id', $user->id)
            ->where('courses_id',$course_id)
            ->count();



        if ($assessments->count() < 1) {
            $assessment = false;
        } else {
            $assessment = true;
        }

        if($user_score >= 1 ) {
            $taken = true;
        } else {
            $taken = false;
        }

        return view(
            'Users.singleCourse',
            [
                'course' => $course,
                'courseContent' => $courseContent,
                'tutor' => $tutor,
                'assessment' => $assessment,
                'courseCompleted' => $courseCompleted,
                'taken' => $taken
            ]
        )->with('user', $user);
    }

    public function learnSingleCourse($content_id)
    {
        $user = User::where('id', '=', session('User'))->first();

        $singleVideo = CourseContent::find($content_id);

        $course = Courses::find($singleVideo->courses_id);

        $courseProgress = CourseLearningProgress::where('content_id', $content_id)->first();



        if ($courseProgress == null) {
            $status = false;
        } else if ($courseProgress->completed == true) {
            $status = true;
        } else {
            $status = false;
        }

        return view(
            'Users.learnsingleCourse',
            [
                'singleVideo' => $singleVideo,
                'course' => $course,
                'course_progress' => $status
            ]
        )->with('user', $user);
    }

    /**
     *Page for User  to create feedback
     */

    public function feedback($course_id)
    {
        $user = User::where('id', '=', session('User'))->first();
        $course = Courses::find($course_id);
        $tutor_id = Tutor::where('id', $course->tutor_id)->first();

        return view(
            'Users.feedback',
            [
                'user' => $user,
                'course' => $course,
                'tutor_id' => $tutor_id
            ]
        )->with('user', $user);
    }

    /**
     * Submit Feedback
     */
    public function submitFeedback(Request $request)
    {
        $request->validate([
            'feedback_message' => 'required'
        ]);

        $course = Courses::find($request->course_id)->first();


        $feedback = Feedback::create([
            'user_id' => $request->user_id,
            'tutor_id' => $request->tutor_id,
            'course' => $course->course_name,
            'feedback_message' => $request->feedback_message,
        ]);

        return back()->with('success', 'Feedback was submitted successfully');
    }


    /**
     * course content progress
     */

    public function submitProgress(Request $request)
    {
        $request->validate([
            'completed' => 'required',
        ]);


        if ($request->completed == 'completed') {
            $status =  true;
        }

        CourseLearningProgress::create([
            'user_id' => $request->user_id,
            'content_id' => $request->content_id,
            'completed' => $status
        ]);

        return back()->with('success', 'Course Completed');
    }

    public function  submitCompletedCourse (Request $request)
    {
        $request->validate([
            'completed' => 'required',
        ]);


        if ($request->completed == 'completed') {
            $status =  true;
        }

        CourseCompleted::create([
            'user_id' => $request->user_id,
            'courses_id' => $request->courses_id,
            'completed' => $status
        ]);

        return back()->with('success', 'Course Completed');
    }

    public function takeAssessment($courseId)
    {

        $user = User::where('id', '=', session('User'))->first();

        $assessments = Assesment::where('course_id', $courseId)->orderBy('created_at', 'desc')->paginate(1);

        return view(
            'Users.takeAssessment',
            [
                'assessments' => $assessments,
                'course_id' => $courseId
            ]
        )->with('user', $user);
    }

    public function retakeAssessment($courseId)
    {

        $user = User::where('id', '=', session('User'))->first();

        $assessments = Assesment::where('course_id', $courseId)->orderBy('created_at', 'desc')->paginate(1);

        $user_score = AssementQuestionScore::where('user_id', $user->id)
            ->where('courses_id',$courseId)->delete();


        return view(
            'Users.takeAssessment',
            [
                'assessments' => $assessments,
                'course_id' => $courseId
            ]
        )->with('user', $user);
    }



    public  function SubmitAssessment(Request $request)
    {
        $assessment = Assesment::find($request->assessment_id);

        if($request->option_a || $request->option_b || $request->option_c == $assessment->correct_answer) {
            $correct = true;
        } else {
            $correct = false;
        }

        $courseId = $request->course_id;


        AssementQuestionScore::create([
            'user_id' => $request->user_id,
            'assesment_id' =>  $request->assessment_id,
            'courses_id' => $request->course_id,
            'correct' => $correct
        ]);

        if($request->finish == null){
            return back()->with('success', 'click next to continue');
        } else {
            return redirect(route('viewAssessment', $courseId ))->with('success', 'You have submitted your assessment');
        }
    }

    public function viewAssessment($courseId)
    {

        $user = User::where('id', '=', session('User'))->first();

        // Retrieve user's score for the given course
        $user_score = AssementQuestionScore::where('user_id', $user->id)
            ->where('courses_id', $courseId)
            ->where('correct', true)
            ->count();



        $attempted_questions_count = AssementQuestionScore::where('user_id', $user->id)
            ->where('courses_id', $courseId)
            ->count();

        $course = Courses::find($courseId);

        // Pass the user's score and attempted questions count to the view
        return view('Users.assessment', [
            'user_score' => $user_score,
            'attempted_questions_count' => $attempted_questions_count,
            'course' => $course->course_name
        ])->with('user', $user);
    }
    public function logoutPage()
    {
        $user = User::where('id', '=', session('User'))->first();

        return view('Users.logout')->with('user', $user);
    }


}
