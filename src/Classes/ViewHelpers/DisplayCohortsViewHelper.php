<?php


namespace Portal\ViewHelpers;


class DisplayCohortsViewHelper
{
    /**
     * Concatenates new applicant's name, email and cohort to join ready to be output.
     *
     * @param $applicants
     *
     * @return string $result, returns name, email, cohortID and all the data for the applicant.
     */
    static public function displayCohorts($cohorts)
    {

        $result = '';
        foreach ($cohorts as $key=>$cohort) {
                $result .= '<li data-id="' . $cohort['id'] .'">' . date("F, Y", strtotime($cohort['date'])) . '</li>';
            }
        return ($result);
    }
}