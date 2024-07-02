<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TutorOtp extends Model
{
    protected $fillable = [
        'tutor_id',
        'otp'
    ];
    use HasFactory;
}
