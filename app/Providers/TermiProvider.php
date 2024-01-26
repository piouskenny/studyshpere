<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;


class TermiProvider
{
    public function sendOTP($phonenumber, $otp)
    {
        $curl = curl_init();
        $data = array(
            "api_key" => env('TERMI_API_KEY'),
            "message_type" => "NUMERIC",
            "to" => 234 . $phonenumber,
            "from" => "Piouskenny",
            "channel" => "dnd",
            "pin_attempts" => 10,
            "pin_time_to_live" =>  5,
            "pin_length" => 6,
            "pin_placeholder" => $otp,
            "message_text" => "Your pin is $otp",
            "pin_type" => "NUMERIC"
        );

        $post_data = json_encode($data);

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.ng.termii.com/api/sms/otp/send",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $post_data,
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json"
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return $response;
    }
}
