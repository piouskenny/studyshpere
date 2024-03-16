<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssementQuestionScore extends Model
{
    protected $fillable =[
        'user_id',
        'assesment_id',
        'courses_id',
        'correct'
    ];
    use HasFactory;
}
