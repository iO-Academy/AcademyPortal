<?php

namespace Portal\ViewHelpers;

use \Portal\Entities\ApplicantEntity;

class DisplayApplicantViewHelper
{
    /**
     * Concatenates new applicant's name, email and cohort to join ready to be output.
     *
     * @param $applicants
     *
     * @return string $result
     */
    static public function displayApplicants($applicants)
    {

        $result = '';
        foreach ($applicants as $applicant) {
            if ($applicant instanceof ApplicantEntity) {
                $result .= 'name: ' . $applicant->getApplicantName() . ' ' .  'email: ' .  $applicant->getApplicantEmail() . ' ' . 'date: ' . $applicant->getApplicantCohortId() . '<br>';
            }
        }
        return $result;
    }
}
