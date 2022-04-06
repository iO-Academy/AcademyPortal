<?php

namespace Portal\Utilities;

class Mailer {

    private static $adminEmail;
    private static $trainerEmail;
    private static $testEmail = 'lgrayland96@gmail.com';


    public static function sendEmail () {

        // $internalEmailsToNotify = array_merge($adminEmail, $trainerEmail);

        $email = new \SendGrid\Mail\Mail();
        $email->setFrom("no-reply@io-academy.uk", "Example User");
        $email->setSubject("New Applicant details");
        $email->addTo(self::$testEmail, "Internal Email Group");
        $email->addContent(
            "text/html", "<h1>I am working</h1>" /*Call ViewHelper Here*/
        );
        $sendgrid = new \SendGrid($_ENV['SENDGRID_API_KEY']);
        try {
            $response = $sendgrid->send($email);
            print $response->statusCode() . "\n";
            print_r($response->headers());
            print $response->body() . "\n";
        } catch (Exception $e) {
            echo 'Caught exception: '. $e->getMessage() ."\n";
        }
    }
}