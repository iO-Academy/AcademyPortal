<?php
/**
 * Created by PhpStorm.
 * User: academy
 * Date: 27/11/2018
 * Time: 10:31
 */

namespace Portal\ViewHelper;


class DisplayApplicantViewHelper
{
    static public function displayApplicants($applicants)
    {
        $result = '';
        foreach ($applicants as $applicant) {
            $result .= "name: ". " " . $applicant['name'] . ' ' .  "email:" . " " .  $applicant['email'] . '  ' . $applicant['date'] . '<br>';
        }
        return $result;
    }

}

