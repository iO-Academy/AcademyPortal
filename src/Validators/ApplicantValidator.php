<?php

namespace Portal\Validators;

use Portal\Abstracts\Globals;

class ApplicantValidator
{
    public static function validate(array $applicant): bool
    {
        return (
        (
            StringValidator::validateExistsAndLength($applicant['name'], StringValidator::MAXVARCHARLENGTH) &&
            NameValidator::validateName($applicant['name'])
        ) &&
         StringValidator::validateExistsAndLength($applicant['email'], StringValidator::MAXVARCHARLENGTH) &&
         filter_var($applicant['email'], FILTER_VALIDATE_EMAIL) !== false &&
         (
            empty($applicant['phoneNumber']) ||
            PhoneNumberValidator::validatePhoneNumber($applicant['phoneNumber'])
         ) &&
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
        DateTimeValidator::validateDateTime($applicant['dateTimeAdded']);

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
                is_numeric($applicant['aptitude']) || empty($applicant['aptitude'])
            ) &&
            (
                empty($applicant['assessmentNotes']) ||
                StringValidator::validateLength(
                    $applicant['assessmentNotes'],
                    StringValidator::MAXTEXTLENGTH,
                    'assessmentNotes'
                )
            ) &&
            (
                $applicant['diversitechInterest'] == 1 ||
                $applicant['diversitechInterest'] == 0 ||
                empty($applicant['diversitechInterest'])
            ) &&
            (
                $applicant['laptop'] == 1 ||
                $applicant['laptop'] == 0 ||
                empty($applicant['laptop'])
            ) &&
            (
                empty($applicant['team']) ||
                StringValidator::validateLength($applicant['team'], StringValidator::MAXVARCHARLENGTH, 'team')
            ) &&
            (
                empty($applicant['stageName']) ||
                StringValidator::validateLength($applicant['stageName'], StringValidator::MAXVARCHARLENGTH, 'stageName')
            ) &&
            (
                empty($applicant['stageOptionId']) ||
                is_numeric($applicant['stageOptionId'])
            ) &&
            is_numeric($applicant['stageId']) &&
            (
                empty($applicant['githubUsername']) ||
                StringValidator::validateLength(
                    $applicant['githubUsername'],
                    StringValidator::MAXVARCHARLENGTH,
                    'githubUsername'
                )
            ) &&
            (
                empty($applicant['portfolioUrl']) ||
                filter_var($applicant['portfolioUrl'], FILTER_VALIDATE_URL)
            ) &&
            (
                empty($applicant['pleskHostingUrl']) ||
                PleskValidator::validate($applicant['pleskHostingUrl'])
            ) &&
            (
                empty($applicant['githubEducationLink']) ||
                GithubEducationValidator::validate($applicant['githubEducationLink'])
            ) &&
            (
                empty($applicant['additionalNotes']) ||
                StringValidator::validateLength(
                    $applicant['additionalNotes'],
                    StringValidator::MAXTEXTLENGTH,
                    'additionalNotes'
                )
            ) &&
            (
                empty($applicant['chosenCourseId']) ||
                is_numeric($applicant['chosenCourseId'])
            )
        );
    }
}
