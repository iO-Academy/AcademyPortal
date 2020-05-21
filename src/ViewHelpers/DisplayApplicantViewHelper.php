<?php

namespace Portal\ViewHelpers;

use Portal\Interfaces\BaseApplicantEntityInterface;

class DisplayApplicantViewHelper
{
    /**
     * Concatenates new applicant's name, email and cohort to join ready to be output.
     *
     * @param $applicants
     *
     * @return string $result, returns name, email, cohortID and all the data for the applicant.
     */
    public static function displayApplicants($applicants)
    {
        $result = '';
        foreach ($applicants as $applicant) {
            if ($applicant instanceof BaseApplicantEntityInterface) {
                $result .= '<tr>
                        <td><a data-id ="'. $applicant->getId().'" type="button" class="myBtn">'
                            . $applicant->getName() .'</a></td>
                            <td>'. $applicant->getEmail() .'</td>
                            <td>'. $applicant->getDateOfApplication() .'</td>
                            <td>'. $applicant->getCohortDate().'</td>
                        </tr>';
            }
        }
        return ($result);
    }
}
