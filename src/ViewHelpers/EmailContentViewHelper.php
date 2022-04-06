<?php

namespace Portal\ViewHelpers;

class EmailContentViewHelper


//$testData = ['fullName' => 'Gabriel', 'email' => 'test@test.com', 'phoneNumber' => '0', 'gender' => ':)', 'background' => 'background', 'why' => '12345', 'experience' => '12345',
//    'startDate' => 'NOW', 'hearAboutUs' => 'Newspaper', 'studyConfirm' => True, 'ageConfirm' => True, 'TermsConfirm' => True];

{
    public static function ApplicantSubmission($applicantData) {
        $result = '';

        $result .= "<table style='text-align: left;width: 100%; border: 1px solid #D3D3D3; border-radius: 5px;'>
                  <tr>
                   <th style='background-color: #eaf2fa;padding: 15px;'>Full Name</th>
                  </tr>
                  <tr>
                    <td style='padding: 15px;'> $applicantData[fullName] </td>
                   </tr>
                  <tr>
                    <th style='background-color: #eaf2fa;padding: 15px;'>Email</th>
                  </tr>
                  <tr>
                    <td style='padding: 15px;'>data</td>
                  </tr>
                  <tr>
                    <th style='background-color: #eaf2fa;padding: 15px;'>Phone number</th>
                  </tr>
                  <tr><td style='padding: 15px;'>data</td></tr>
                  <tr>
                    <th style='background-color: #eaf2fa;padding: 15px;'>Gender</th>
                  </tr>
                  <tr>
                    <td style='padding: 15px;'>data</td>
                  </tr>
                  <tr>
                    <th style='background-color: #eaf2fa;padding: 15px;'>Background</th>
                  </tr>
                  <tr>
                    <td style='padding: 15px;'>data</td>
                  </tr>
                  <tr>
                    <th style='background-color: #eaf2fa;padding: 15px;'>Why do you want to become a developer?</th>
                  </tr>
                  <tr>
                    <td style='padding: 15px;'>data</td>
                  </tr>
                  <tr>
                    <th style='background-color: #eaf2fa;padding: 15px;'>Any past coding experience?</th>
                  </tr>
                  <tr>
                    <td style='padding: 15px;'>data</td>
                  </tr>
                  <tr>
                    <th style='background-color: #eaf2fa;padding: 15px;'>Select start date(s)</th>
                  </tr>
                  <tr>
                    <td style='padding: 15px;'>data</td>
                  </tr>
                  <tr>
                    <th style='background-color: #eaf2fa;padding: 15px;'>How did you hear about us?</th>
                  </tr>
                  <tr>
                    <td style='padding: 15px;'>data</td>
                  </tr>
                  <tr>
                    <th style='background-color: #eaf2fa;padding: 15px;'>Study confirmation</th>
                  </tr>
                  <tr>
                    <td style='padding: 15px;'>data</td>
                  </tr>
                  <tr>
                    <th style='background-color: #eaf2fa;padding: 15px;'>Age confirmation</th>
                  </tr>
                  <tr>
                    <td style='padding: 15px;'>data</td>
                  </tr>
                  <tr>
                    <th style='background-color: #eaf2fa;padding: 15px;'>Terms confirmation</th>
                  </tr>
                  <tr>
                    <td style='padding: 15px;'>data</td>
                  </tr> 
                </table";
        return $result;
    }
}
