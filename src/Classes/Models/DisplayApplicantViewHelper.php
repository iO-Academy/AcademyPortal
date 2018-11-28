<?php

namespace Portal\Models;


class DisplayApplicantViewHelper
{

    static public function displayApplicants($applicants)
    {
        $result = '';
        foreach ($applicants as $applicant) {
            $result .= $applicant['name'] . $applicant['email'] . $applicant['cohortid'];
        }
        return $result;
    }
}