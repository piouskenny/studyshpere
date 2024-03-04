<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assesment extends Model
{
    protected $fillable =
    [
        'course_id',
        'tutor_id',
        'question',
        'correct_answer',
        'option_a',
        'option_b',
        'option_c'
    ];


    public function tutor()
    {
        return $this->belongsTo(Tutor::class);
    }

    use HasFactory;
}
