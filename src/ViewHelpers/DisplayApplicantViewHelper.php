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
                                <td>
                                    <a 
                                    href="#"
                                    data-id="' . $applicant->getId() . '" 
                                       type="button"  
                                       class="myBtn">
                                      ' . $applicant->getName() . '
                                    </a>
                                </td>
                                <td>' . $applicant->getEmail() . '</td>
                                <td>' . $applicant->getDateOfApplication() . '</td>
                                <td>' . $applicant->getCohortDate() . '</td>
                                <td>                              
                                    <a href="/editApplicant?id=' . $applicant->getId() . '"   
                                       type="button"                                   
                                       class="btn btn-primary edit">
                                       Edit
                                    </a>                                                                   
                                    <a
                                            href="#"
                                            type="delete"
                                            class="btn btn-danger delete deleteBtn"
                                            data-id="' . $applicant->getId() . '">
                                            Delete
                                    </a>                                   
                                </td>
                            </tr>';
            }
        }
        return ($result);
    }
}
