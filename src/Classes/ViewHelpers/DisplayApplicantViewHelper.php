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
     * @return string $result, returns name, email, cohortID and all the data for the applicant.
     */
    static public function displayApplicants($applicants)
    {
        $result = '';
        foreach ($applicants as $applicant) {
            if ($applicant instanceof ApplicantEntity) {
                $result .= '<tr class="applicant table-row">
                        <td><a data-id ="'. $applicant->getId().'" type="button"  class="myBtn">'. $applicant->getName() .'</a></td>
                        <td>'. $applicant->getEmail() .'</td>
                        <td class="dateApplied" data-applied="'. $applicant->getDateOfApplicationMMDDYYYY() .'">'. $applicant->getDateOfApplicationDDMMYYYY() .'</td>
                        <td class="applicants-cohort-date">'. $applicant->getCohortDate() .'</td>
                        </tr>';
            }
        }
        return ($result);
    }
}
