<?php

namespace Portal\ViewHelpers;

class EmailContentViewHelper

{
    public static function ApplicantSubmission($applicantData) {
        $result = '';
        $applicantDataResult = ($applicantData['eligible'] ? 'Yes' : 'No');
        $ageResult = ($applicantData['eighteenPlus'] ? 'Yes' : 'No');


        $result .= "<table style='text-align: left;width: 100%; border: 1px solid #D3D3D3; border-radius: 5px;'>
                  <tr>
                   <th style='background-color: #eaf2fa;padding: 15px;'>Full Name</th>
                  </tr>
                  <tr>
                    <td style='padding: 15px;'> $applicantData[name] </td>
                   </tr>
                  <tr>
                    <th style='background-color: #eaf2fa;padding: 15px;'>Email</th>
                  </tr>
                  <tr>
                    <td style='padding: 15px;'>$applicantData[email]</td>
                  </tr>
                  <tr>
                    <th style='background-color: #eaf2fa;padding: 15px;'>Phone number</th>
                  </tr>
                  <tr><td style='padding: 15px;'>$applicantData[phoneNumber]</td></tr>
                  <tr>
                    <th style='background-color: #eaf2fa;padding: 15px;'>Gender</th>
                  </tr>
                  <tr>
                    <td style='padding: 15px;'>$applicantData[gender]</td>
                  </tr>
                  <tr>
                    <th style='background-color: #eaf2fa;padding: 15px;'>Background</th>
                  </tr>
                  <tr>
                    <td style='padding: 15px;'>$applicantData[backgroundInfo]</td>
                  </tr>
                  <tr>
                    <th style='background-color: #eaf2fa;padding: 15px;'>Why do you want to become a developer?</th>
                  </tr>
                  <tr>
                    <td style='padding: 15px;'>$applicantData[whyDev]</td>
                  </tr>
                  <tr>
                    <th style='background-color: #eaf2fa;padding: 15px;'>Any past coding experience?</th>
                  </tr>
                  <tr>
                    <td style='padding: 15px;'>$applicantData[codeExperience]</td>
                  </tr>
                  <tr>
                    <th style='background-color: #eaf2fa;padding: 15px;'>Select start date(s)</th>
                  </tr>
                  <tr>
                    <td style='padding: 15px;'>$applicantData[cohortDate]</td>
                  </tr>
                  <tr>
                    <th style='background-color: #eaf2fa;padding: 15px;'>How did you hear about us?</th>
                  </tr>
                  <tr>
                    <td style='padding: 15px;'>$applicantData[hearAboutId]</td>
                  </tr>
                  <tr>
                    <th style='background-color: #eaf2fa;padding: 15px;'>Study confirmation</th>
                  </tr>
                  <tr>
                    <td style='padding: 15px;'>$applicantDataResult</td>
                  </tr>
                  <tr>
                    <th style='background-color: #eaf2fa;padding: 15px;'>Age confirmation</th>
                  </tr>
                  <tr>
                    <td style='padding: 15px;'>$ageResult</td>
                  </tr>
                </table";
        return $result;
    }
}

