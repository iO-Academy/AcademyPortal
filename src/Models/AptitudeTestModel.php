<?php

namespace Portal\Models;

class AptitudeTestModel
{
    private const URL = 'https://api.aptitude-test.dev.io-academy.uk/user?email=';

    public function sendEmailToApi(string $email)
    {
        $curl = curl_init(self::URL . $email);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl) ;
        return json_decode($response, true);
    }
}
