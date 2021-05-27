<?php

namespace Portal\Validators;

use Portal\Abstracts\Globals;

class ApplicantValidator
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
            is_numeric($applicant['cohortId']) &&
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


    public static function validateAdditionalFields(array $applicant): bool
    {
        DateTimeValidator::validateDate($applicant['assessmentDay']);
        DateTimeValidator::validateDate($applicant['assessmentDay']);
        DateTimeValidator::validateTime($applicant['assessmentTime']);
        DateTimeValidator::validateDateTime($applicant['dateTimeAdded']);

        $feePaymentMethods = (int)$applicant['upfront'] + (int)$applicant['edaid'] + (int)$applicant['diversitech'];

        if (
            ((int)$applicant['fee'] > 0
            && $feePaymentMethods > (int)$applicant['fee'])
            || ($feePaymentMethods > Globals::ACADEMYPRICE)
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
            ) &&
            (
                is_numeric($applicant['attitude']) || empty($applicant['attitude'])
            ) &&
            (
                is_numeric($applicant['averageScore']) || empty($applicant['averageScore'])
            ) &&
            (
                is_numeric($applicant['fee']) || empty($applicant['fee'])
            ) &&
            (
                $applicant['signedTerms'] == 1 ||
                $applicant['signedTerms'] == 0 ||
                empty($applicant['signedTerms'])
            ) &&
            (
                $applicant['signedDiversitech'] == 1 ||
                $applicant['signedDiversitech'] == 0 ||
                empty($applicant['signedDiversitech'])
            ) &&
            (
                $applicant['signedNDA'] == 1 ||
                $applicant['signedNDA'] == 0 ||
                empty($applicant['signedNDA'])
            ) &&
            (
                $applicant['inductionEmailSent'] == 1 ||
                $applicant['inductionEmailSent'] == 0 ||
                empty($applicant['inductionEmailSent'])
            ) &&
            (
                $applicant['checkedID'] == 1 ||
                $applicant['checkedID'] == 0 ||
                empty($applicant['checkedID'])
            ) &&
            (
                $applicant['contactFormSigned'] == 1 ||
                $applicant['contactFormSigned'] == 0 ||
                empty($applicant['contactFormSigned'])
            ) &&
            (
                $applicant['dataProtectionName'] == 1 ||
                $applicant['dataProtectionName'] == 0 ||
                empty($applicant['dataProtectionName'])
            ) &&
            (
                $applicant['dataProtectionPhoto'] == 1 ||
                $applicant['dataProtectionPhoto'] == 0 ||
                empty($applicant['dataProtectionPhoto'])
            ) &&
            (
                $applicant['dataProtectionTestimonial'] == 1 ||
                $applicant['dataProtectionTestimonial'] == 0 ||
                empty($applicant['dataProtectionTestimonial'])
            ) &&
            (
                $applicant['dataProtectionBio'] == 1 ||
                $applicant['dataProtectionBio'] == 0 ||
                empty($applicant['dataProtectionBio'])
            ) &&
            (
                $applicant['dataProtectionVideo'] == 1 ||
                $applicant['dataProtectionVideo'] == 0 ||
                empty($applicant['dataProtectionVideo'])
            )
        );
    }
}
