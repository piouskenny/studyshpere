<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    protected $fillable = [
        'course_name',
        'course_type',
        'description',
        'tutor_id',
        'students_enrolled',
        'course_image'
    ];

    public function tutor()
    {
        return $this->belongsTo(Tutor::class);
    }

    public function courseContent()
    {
        return $this->hasMany(CourseContent::class);
    }

    use HasFactory;
}
