<?php


namespace Portal\Validators;


class EditApplicantFormDataValidator
{
    public static function applicantFormDataValidator(array $applicantData): bool
    {
        return (
            !empty($applicantData['name'])
//            !empty($applicantData['email']) &&
//            filter_var($applicantData['email'], FILTER_VALIDATE_EMAIL) &&
//            !empty($applicantData['phoneNumber']) &&
//            !empty($applicantData['cohortId']) &&
//            !empty($applicantData['hearAboutId']) &&
//            (strlen($applicantData['whyDev']) <= 10000) &&
//            (strlen($applicantData['codeExperience']) <= 10000) &&
//            (strlen($applicantData['notes']) <= 10000) &&
//            (strlen($applicantData['aptitude']) <= 3) &&
//            ((bool)strtotime($applicantData['assessmentDay'])) &&
//            preg_match('/^[01][0-9]|2[0-3]):([0-5][0-9])/', $applicantData['assessmentTime']) &&
//            (strlen($applicantData['assessmentNotes']) <= 10000) &&
//            (strlen($applicantData['diversitech']) <= 5) &&
//            (strlen($applicantData['edaid']) <= 5) &&
//            (strlen($applicantData['upfront']) <= 5) &&
//            ((bool)strtotime($applicantData['kitCollectionDay'])) &&
//            preg_match('/^[01][0-9]|2[0-3]):([0-5][0-9])/', $applicantData['kitCollectionTime']) &&
//            ((int)$applicantData['kitNum'] > 100) &&
//            ((int)$applicantData['laptopNum'] > 100) &&
//            preg_match('/^[01][0-9]|2[0-3]):([0-5][0-9])/', $applicantData['taster']) &&
//            filter_var($applicantData['githubEduLink'], FILTER_VALIDATE_URL) &&
//            (strlen($applicantData['githubUerName']) <= 255) &&
//            filter_var($applicantData['portfolioUrl'], FILTER_VALIDATE_URL) &&
//            filter_var($applicantData['pleskUrl'], FILTER_VALIDATE_URL) &&
//            (strlen($applicantData['pleskUsername']) <= 255) &&
//            (strlen($applicantData['pleskPassword']) <= 255) &&
//            (strlen($applicantData['additionalNotes']) <= 10000) &&
//            preg_match('/^[01][0-9]|2[0-3]):([0-5][0-9])/', $applicantData['chosenCourseDate'])
        );
    }
}
