<?php

namespace Portal\Validators;

class ContactValidator
{
    public static function validate(array $contact): bool
    {
        StringValidator::validateExistsAndLength(
            $contact['contactName'],
            StringValidator::MAXVARCHARLENGTH,
            'contactName'
        );
        StringValidator::validateExistsAndLength(
            $contact['contactEmail'],
            StringValidator::MAXVARCHARLENGTH,
            'contactEmail'
        );

        if (!is_numeric($contact['contactCompanyId'])) {
            throw new \Exception('Invalid company Id.');
        }

        if (!is_null($contact['jobTitle'])) {
            StringValidator::ValidateLength($contact['jobTitle'], StringValidator::MAXVARCHARLENGTH, 'jobTitle');
        }

        if (!is_null($contact['contactPhone'])) {
            StringValidator::ValidateLength($contact['contactPhone'], 20, 'contactPhone');
        }

        if (!is_bool($contact['contactIsPrimary'])) {
            throw new \Exception('Invalid value for primary contact.');
        }

        if (EmailValidator::validateEmail($contact['contactEmail']) === false) {
            throw new \Exception('Email address is invalid.');
        }

        return true;
    }
}
