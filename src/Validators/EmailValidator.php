<?php

namespace Portal\Validators;

class EmailValidator
{
    /**
     * Sanitise the applicant's email from the applicant's data.
     *
     * @return string|bool $email returns valid email or false.
     */
    public static function validateEmail(string $email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
}
