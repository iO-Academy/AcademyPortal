<?php

namespace Portal\Validators;

use Portal\Abstracts\Globals;

class CsvUploadValidator
{
    public static function validate(array $applicant): bool
    {
        return (
            (
                StringValidator::validateExistsAndLength(
                    $applicant['name'],
                    StringValidator::MAXVARCHARLENGTH,
                    'name'
                )
                && StringValidator::validateAlpha($applicant['name'])
            ) &&
            StringValidator::validateExistsAndLength($applicant['email'], StringValidator::MAXVARCHARLENGTH, 'email')
            &&
            filter_var($applicant['email'], FILTER_VALIDATE_EMAIL) !== false &&
            (
                empty($applicant['phoneNumber']) ||
                PhoneNumberValidator::validatePhoneNumber($applicant['phoneNumber'])
            ) &&
            is_array($applicant['cohort']) &&
            !empty($applicant['cohort']) &&
            StringValidator::validateExistsAndLength(
                $applicant['whyDev'],
                StringValidator::MAXTEXTLENGTH,
                'your reasons for wanting to become a developer'
            )
            &&
            StringValidator::validateExistsAndLength(
                $applicant['codeExperience'],
                StringValidator::MAXTEXTLENGTH,
                'your experience of coding'
            )
            &&
            is_numeric($applicant['hearAboutId']) &&
            is_numeric($applicant['gender']) &&
            is_numeric($applicant['backgroundInfoId']) &&
            (
                $applicant['eligible'] == 1 || $applicant['eligible'] == 0
            ) &&
            (
                $applicant['eighteenPlus'] == 1 || $applicant['eighteenPlus'] == 0
            ) &&
            (
                $applicant['finance'] == 1 || $applicant['finance'] == 0
            ) &&
            strlen($applicant['notes']) <= StringValidator::MAXTEXTLENGTH
        );
    }
}