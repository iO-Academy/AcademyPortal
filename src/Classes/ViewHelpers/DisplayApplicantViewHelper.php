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
                $result .= '<strong>Name:</strong> ' . $applicant->getName() . '<strong> Email:</strong> ' .  $applicant->getEmail() . '<strong> Date:</strong> ' . $applicant->getCohortDate() . '<br>';
            }
        }
        return ($result);
    }
}
