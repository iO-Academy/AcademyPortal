<?php

namespace Portal\Validators;

use Portal\Abstracts\Globals;

class ApplicantValidator
{
    public static function validate(array $applicant): bool
    {
        return (
         StringValidator::validateExistsAndLength($applicant['name'], StringValidator::MAXVARCHARLENGTH) &&
         StringValidator::validateExistsAndLength($applicant['email'], StringValidator::MAXVARCHARLENGTH) &&
         filter_var($applicant['email'], FILTER_VALIDATE_EMAIL) !== false &&
         StringValidator::validateExistsAndLength($applicant['name'], StringValidator::MAXVARCHARLENGTH) &&
         PhoneNumberValidator::validatePhoneNumber($applicant['phoneNumber']) &&
         is_numeric($applicant['cohortId']) &&
         StringValidator::validateExistsAndLength($applicant['whyDev'], StringValidator::MAXTEXTLENGTH) &&
         StringValidator::validateExistsAndLength($applicant['codeExperience'], StringValidator::MAXTEXTLENGTH) &&
         is_numeric($applicant['hearAboutId']) &&
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

    public static function validateAdditionalFields(array $applicant): bool
    {
        DateTimeValidator::validateDate($applicant['assessmentDay']);
        DateTimeValidator::validateDate($applicant['assessmentDay']);
        DateTimeValidator::validateTime($applicant['assessmentTime']);

        if (
            (
                (int)$applicant['upfront'] + (int)$applicant['edaid'] + (int)$applicant['diversitech']
            ) > Globals::ACADEMYPRICE
        ) {
            throw new \Exception('Total payment is more than course price');
        }

        DateTimeValidator::validateDate($applicant['kitCollectionDay']);
        DateTimeValidator::validateTime($applicant['kitCollectionTime']);
        DateTimeValidator::validateDate($applicant['taster']);

        return (
            (
                $applicant['apprentice'] == 1 || $applicant['apprentice'] == 0
            ) &&
            (
                is_numeric($applicant['aptitude']) || is_null($applicant['aptitude'])
            ) &&
            (
                is_null($applicant['assessmentNotes']) ||
                StringValidator::validateLength(
                    $applicant['assessmentNotes'],
                    StringValidator::MAXTEXTLENGTH,
                    'assessmentNotes'
                )
            ) &&
            (
                $applicant['diversitechInterest'] == 1 ||
                $applicant['diversitechInterest'] == 0 ||
                is_null($applicant['diversitechInterest'])
            ) &&
            (
                $applicant['laptop'] == 1 ||
                $applicant['laptop'] == 0 ||
                is_null($applicant['laptop'])
            ) &&
            (
                !isset($applicant['team']) ||
                is_null($applicant['team']) ||
                StringValidator::validateLength($applicant['team'], StringValidator::MAXVARCHARLENGTH, 'team')
            ) &&
            (
                !isset($applicant['stageName']) ||
                is_null($applicant['stageName']) ||
                StringValidator::validateLength($applicant['stageName'], StringValidator::MAXVARCHARLENGTH, 'stageName')
            ) &&
            is_numeric($applicant['stageId'])
        );
    }
}
