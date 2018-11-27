<?php

namespace Portal\ViewHelpers;


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
            $result .= "name: " . $applicant['name'] . ' ' .  "email: " .  $applicant['email'] . ' ' . "date: " . $applicant['date'];
        }
        return $result;
    }
}
