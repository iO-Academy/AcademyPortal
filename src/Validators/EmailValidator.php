<?php

namespace Portal\Validators;

class EmailValidator
{
    /**
     * Sanitise the applicant's email from the applicant's data.
     *
     * @param string $email
     *
     * @return string $email, returns valid email.
     * @return bool, returns false if invalid email.
     */
    public static function validateEmail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
}
