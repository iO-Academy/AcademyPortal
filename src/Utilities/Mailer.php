<?php

namespace Portal\Utilities;

use Portal\ViewHelpers\EmailContentViewHelper;

class Mailer {

    private static $adminEmail = ['test@test.com];
    private static $trainerEmail = ['test2@test.com];


	/**
     * Description: Combine email lists from static properties
     * @return array All email addresses, as an array
     */
    public static function createEmailList(): array
    {
        return $allEmails = array_merge(self::$adminEmail, self::$trainerEmail);
    }

    public static function sendEmail ($emailAddress, $applicantData, $applicantId) {

        $email = new \SendGrid\Mail\Mail();
        $email->setFrom("no-reply@io-academy.uk", "Example User");
        $email->setSubject("New Applicant details");
        $email->addTo($emailAddress, "Internal Email Group");
        $email->addContent(
            "text/html", EmailContentViewHelper::ApplicantSubmission($applicantData, $applicantId)
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

    public static function sendAllEmails ($applicantData, $applicantId){
        $mailingList = self::createEmailList();
        foreach ($mailingList as $email) {
            self::sendEmail($email, $applicantData, $applicantId);
        }
    }
}