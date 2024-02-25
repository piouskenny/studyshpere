<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $fillable =
    [
        'user_id',
        'tutor_id',
        'courses_id',
        'feedback_message'
    ];

    use HasFactory;
}
