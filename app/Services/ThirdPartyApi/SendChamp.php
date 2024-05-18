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
}
