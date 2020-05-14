<?php


namespace Portal\Validators;


class EmailValidator
{
    /**
     * Sanitise the applicant's email from the applicant's data.
     *
     * @param string $applicantData
     *
     * @return string $applicantData, returns valid email.
     * @return bool, returns false if invalid email.
     */
    public static function validateEmail($applicantData)
    {
        if (filter_var($applicantData, FILTER_VALIDATE_EMAIL)) {
            return $applicantData;
        } else {
            return false;
        }
    }
}