<?php

namespace App\Services\Courses;

use App\Models\CourseEnrollment;

class CourseEnrollmentService
{
    public function enrollStudent($course_id, $tutor_id, $student_id)
    {
        /**
         * Check if User already enrolled
         */
        $status = CourseEnrollment::where('course_id', $course_id)
            ->where('user_id', $student_id)
            ->get();

        if ($status->count() > 1) {
            return false;
        }

        /**
         * Enroll student by creating an enrollment table
         */
        $enroll = CourseEnrollment::create([
            'course_id' => $course_id,
            'tutor_id' => $tutor_id,
            'user_id' => $student_id
        ]);

        if (!$enroll) {
            return back()->with('failed', 'unable to enroll for course contact the adminF');
        }

        return true;
    }
}
