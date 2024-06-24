<?php

namespace App\Services\ThirdPartyApi;

use GuzzleHttp\Client;

class Sendchampopt
{
    public function sendopt($phonenumber, $otp ){

        $key = 'sendchamp_live_$2a$10$SD7QDxEukEt.Ik10Of/6Me/lXQelKc/vtF5n0IS4K3WCSQokA6agm';
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://sandbox-api.sendchamp.com/api/v1/sms/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode([
                'to' => [$phonenumber],
                'message' => "Your one time otp is {$otp}",
                'sender_name' => "StudyPadi",
                'route' => "non_dnd"
            ]),
            CURLOPT_HTTPHEADER => array(
                'Accept: application/json',
                `Authorization: Bearer {$key}`,
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
    }

}
