<?php

namespace App\Services\ThirdPartyApi;

use GuzzleHttp\Client;

class SendChamp
{
    public $baseurl = "https://api.sendchamp.com/api/v1";
    private $key = 'sendchamp_live_$2a$10$SD7QDxEukEt.Ik10Of/6Me/lXQelKc/vtF5n0IS4K3WCSQokA6agm';

    public function sendOPT()
    {
        $client = new Client(['base_uri' => $this->baseurl]);

        $response = $client->request('POST', '/verification/create', [
            'headers' => [
                'accept' => 'application/json',
                'content-type' => 'application/json',
            ],
            'json' => [
                "channel" => "string",
                "sender" => "string",
                "token_type" => "string",
                "token_length" => 0,
                "expiration_time" => 0,
                "customer_email_address" => "string",
                "customer_mobile_number" => "string",
                "meta_data" => [
                    "first_name" => "string"
                ],
                "token" => "string"
            ]
        ]);

        return $response->getBody()->getContents();
    }

    public function test2() {
        $key = 'sendchamp_live_$2a$10$SD7QDxEukEt.Ik10Of/6Me/lXQelKc/vtF5n0IS4K3WCSQokA6agm';

            $curl = curl_init();

            curl_setopt_array($curl, [
            CURLOPT_URL => "https://api.sendchamp.com/api/v1/verification/create",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "channel=sms&sender=Sendchamp&token_type=numeric&token_length=6&expiration_time=10&customer_mobile_number=2347068186976&meta_data=&in_app_token=false",
            CURLOPT_HTTPHEADER => [
                "Accept: application/json,text/plain,*/*",
                `Authorization: Bearer {$key}`,
                "Content-Type: application/json"
            ],
            ]);

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
            echo "cURL Error #:" . $err;
            } else {
            echo $response;
            }
                }
}
