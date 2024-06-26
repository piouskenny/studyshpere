<?php

namespace App\Classes;

use App\Mail\OtpMail;
use Illuminate\Support\Facades\Mail;

class EmailClass
{
    /**
     * Create a new class instance.
     */
    public function __construct($otp, $recipientMail)
    {
        $title = 'OTP Verification For Study Padi';
        $body = "Your OTP is $otp Thank you for signup to Study Padi, Please Contact us if you did not initiate this process.!";

        $mail = Mail::to($recipientMail)->send(new OtpMail($title, $body));

        if(!$mail) {
            return false;
        }
        return true;
    }
}
