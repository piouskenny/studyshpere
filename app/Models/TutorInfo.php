<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TutorInfo extends Model
{
    protected $fillable = [
        'tutor_id',
        'degree',
        'field_specialization',
        'years_experience',
        'certification'
    ];

    use HasFactory;
}
