<?php

namespace Portal\Models;


class DisplayApplicantViewHelper
{

    /**
     * Get's applicants name, email and cohortID, to display.
     *
     * @param $applicants.
     *
     * @return string for name, email and cohortID.
     */
    static public function displayApplicants($applicants)
    {
        $result = '';
        foreach ($applicants as $applicant) {
            $result .= $applicant['name'] . $applicant['email'] . $applicant['cohortid'];
        }
        return $result;
    }
}
