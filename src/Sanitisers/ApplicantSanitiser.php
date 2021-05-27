<?php

namespace Portal\Sanitisers;

use Portal\Validators\EmailValidator;

class ApplicantSanitiser
{
    /**
     * Sanitise all data for an applicant
     *
     * @param array $applicant applicant data
     *
     * @return array sanitised applicant data
     */
    public static function sanitise(array $applicant): array
    {
        $applicant['id'] = (int)$applicant['id'];
        $applicant['name'] = StringSanitiser::sanitiseString($applicant['name']);
        $applicant['email'] = StringSanitiser::sanitiseString($applicant['email']);
        $applicant['email'] = EmailValidator::validateEmail($applicant['email']);
        $applicant['phoneNumber'] = StringSanitiser::sanitiseString($applicant['phoneNumber']);
        $applicant['cohortId'] = array_map(function($cohortId){
            return(int)$cohortId;
            }, $applicant['cohortId']);
        $applicant['whyDev'] = StringSanitiser::sanitiseString($applicant['whyDev']);
        $applicant['codeExperience'] = StringSanitiser::sanitiseString($applicant['codeExperience']);
        $applicant['hearAboutId'] = (int)$applicant['hearAboutId'];
        $applicant['eligible'] = $applicant['eligible'] ? 1 : 0;
        $applicant['eighteenPlus'] = $applicant['eighteenPlus'] ? 1 : 0;
        $applicant['finance'] = $applicant['finance'] ? 1 : 0;
        $applicant['notes'] = StringSanitiser::sanitiseString($applicant['notes']);

        return $applicant;
    }

    /**
     * Sanitise additional field data for an applicant
     *
     * @param array $applicant applicant data
     *
     * @return array sanitised applicant data
     */
    public static function sanitiseAdditionalFields(array $applicant): array
    {
        $applicant['apprentice'] = $applicant['apprentice'] ? 1 : 0;
        $applicant['aptitude'] = $applicant['aptitude'] ? (int)$applicant['aptitude'] : null;
        $applicant['assessmentDay'] = !empty($applicant['assessmentDay']) ? $applicant['assessmentDay'] : null;
        $applicant['assessmentNotes'] = StringSanitiser::sanitiseString($applicant['assessmentNotes']);

        if ($applicant['diversitechInterest'] !== null) {
            $applicant['diversitechInterest'] = $applicant['diversitechInterest'] ? 1 : 0;
        }

        $applicant['diversitech'] = $applicant['diversitech'] ? (int)$applicant['diversitech'] : null;
        $applicant['edaid'] = $applicant['edaid'] ? (int)$applicant['edaid'] : null;
        $applicant['upfront'] = $applicant['upfront'] ? (int)$applicant['upfront'] : null;

        $applicant['kitCollectionDay'] = !empty($applicant['kitCollectionDay']) ? $applicant['kitCollectionDay'] : null;
        $applicant['kitNum'] = $applicant['kitNum'] ? (int)$applicant['kitNum'] : null;

        if ($applicant['laptop'] !== null) {
            $applicant['laptop'] = $applicant['laptop'] ? 1 : 0;
        }

        $applicant['laptopDeposit'] = $applicant['laptopDeposit'] ? 1 : 0;
        $applicant['laptopNum'] = $applicant['laptopNum'] ? (int)$applicant['laptopNum'] : null;
        $applicant['taster'] = !empty($applicant['taster']) ? $applicant['taster'] : null;
        $applicant['tasterAttendance'] = $applicant['tasterAttendance'] ? 1 : 0;
        $applicant['team'] = !empty($applicant['team']) ? StringSanitiser::sanitiseString($applicant['team']) : null;
        $applicant['stageId'] = (int)$applicant['stageId'];
        $applicant['stageOptionId'] = $applicant['stageOptionId'] ?? null;

        $applicant['githubUsername'] =
            !empty($applicant['githubUsername']) ? StringSanitiser::sanitiseString($applicant['githubUsername']) : null;
        $applicant['additionalNotes'] =
            !empty($applicant['additionalNotes']) ?
                StringSanitiser::sanitiseString($applicant['additionalNotes']) : null;
        $applicant['chosenCourseId'] = !empty($applicant['chosenCourseId']) ? (int)$applicant['chosenCourseId'] : null;

        return $applicant;
    }
}
