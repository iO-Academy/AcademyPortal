<?php

namespace Portal\Models;

class RandomPasswordModel
{
    private const URL = 'https://passwordwolf.com/api/?repeat=';
    private const NUMBEROFPASSWORDS = '10';

    public function __invoke()
    {
        $ch = curl_init();

        // set url
        curl_setopt($ch, CURLOPT_URL, self::URL . self::NUMBEROFPASSWORDS);

        //return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);


        // $output contains the output string
        $password = json_decode(curl_exec($ch));
        shuffle($password);

        // close curl resource to free up system resources
        curl_close($ch);

        return array_pop($password)->password;
    }
}
