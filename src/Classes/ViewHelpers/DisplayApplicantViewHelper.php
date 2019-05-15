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
<<<<<<< HEAD
                $result .= '<tr>
                        <td><a data-id ="'. $applicant->getId().'" type="button"  class="myBtn">'. $applicant->getName() .'</a></td>
=======
                $result .= '<tr class="applicant">
                        <td>'. $applicant->getName() .'</td>
>>>>>>> RMPstory2_task_date-filter
                        <td>'. $applicant->getEmail() .'</td>
                        <td class="dateApplied" data-applied="'. $applicant->getDateOfApplicationUsingMMDDYYYY() .'">'. $applicant->getDateOfApplication() .'</td>
                        <td>'. $applicant->getCohortDate() .'</td>
<!--                       <td><a type="button"  id="myBtn">Get Info</a></td> -->
                    </tr>';
            }
        }
        return ($result);
    }
}
