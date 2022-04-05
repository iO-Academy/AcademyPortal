<?php

class Mailer {

    private $adminEmail;
    private $trainerEmail;

    public function mailApplication () {

        $internalEmailsToNotify = array_merge($adminEmail, $trainerEmail);

        $email = new \SendGrid\Mail\Mail();
        $email->setFrom("no-reply@io-academy.uk", "Example User");
        $email->setSubject("New Applicant details");
        $email->addTo($internalEmailsToNotify, "Internal Email Group");
        $email->addContent("text/plain", "and easy to do anywhere, even with PHP");
        $email->addContent(
            "text/html", "<strong>and easy to do anywhere, even with PHP</strong>" /*Call ViewHelper Here*/
        );
        $sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));
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