<?php

namespace Portal\Models;

class AptitudeTestModel
{
    private const URL = 'https://api.aptitude-test.dev.io-academy.uk/user?email=';
    private const APTURL = 'https://api.aptitude-test.dev.io-academy.uk/result?id=';
    public function sendEmailToApi(string $email)
    {
        $curl = curl_init(self::URL . $email);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        return json_decode($response, true);
    }


    public function sendIdToApi(string $id)
    {
        $curl = curl_init(self::APTURL . $id);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        return json_decode($response, true);
    }
}