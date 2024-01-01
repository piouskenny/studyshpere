<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    protected $fillable = [
        'course_name',
        'course_type',
        'tutor',
        'students_enrolled',
        'course_image'
    ];

    

    use HasFactory;
}
