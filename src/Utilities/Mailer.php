<?php

namespace Portal\Utilities;

use Portal\ViewHelpers\EmailContentViewHelper;

class Mailer {

            private static $adminEmail = ['lgrayland96@gmail.com'];
            private static $trainerEmail = ['jordanaddis@gmail.com'];
//        private static $testEmails;
//        private static $testEmailsString;


    public static function sendEmail ($emailAddress, $applicantData) {

//        self::$testEmails = ['lgrayland96@gmail.com', 'jordanaddis@gmail.com'];
//        self::$testEmailsString = implode(', ', self::$testEmails);

        // $internalEmailsToNotify = array_merge($adminEmail, $trainerEmail);


        $email = new \SendGrid\Mail\Mail();
        $email->setFrom("no-reply@io-academy.uk", "Example User");
        $email->setSubject("New Applicant details");
        $email->addTo($emailAddress, "Internal Email Group");
        $email->addContent(
            "text/html", EmailContentViewHelper::ApplicantSubmission($applicantData)
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

    /**
     * Description: Combine email lists from static properties
     * @return array All email addresses, as an array
     */
    public static function createEmailList(): array
    {
        return $allEmails = array_merge(self::$adminEmail, self::$trainerEmail);
    }

    public static function sendAllEmails ($applicantData){
        $mailingList = self::createEmailList();
        foreach ($mailingList as $email) {
            self::sendEmail($email, $applicantData);
        }
    }
}

