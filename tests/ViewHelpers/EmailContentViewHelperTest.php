<?php

namespace Tests\ViewHelpers;

use phpDocumentor\Reflection\Type;
use PHPUnit\Framework\TestCase;
use Portal\ViewHelpers\EmailContentViewHelper;


class EmailContentViewHelperTest extends TestCase
{
    private static $testData = [
        'name' => 'Gabriel',
        'email' => 'test@test.com',
        'phoneNumber' => '0',
        'gender' => ':)',
        'backgroundInfo' => 'background',
        'whyDev' => '12345',
        'codeExperience' => '12345',
        'cohortDate' => 'NOW',
        'hearAboutId' => 'Newspaper',
        'eligible' => true,
        'eighteenPlus' => true];

    private static $applicantId = 12;


    public static function testApplicantSubmissionSuccess() {

        $expected = "<table style='text-align: left;width: 100%; border: 1px solid #D3D3D3; border-radius: 5px;'>
                  <tr>
                   <th style='background-color: #eaf2fa;padding: 15px;'>Full Name</th>
                  </tr>
                  <tr>
                    <td style='padding: 15px;'> Gabriel </td>
                   </tr>
                  <tr>
                    <th style='background-color: #eaf2fa;padding: 15px;'>Email</th>
                  </tr>
                  <tr>
                    <td style='padding: 15px;'>test@test.com</td>
                  </tr>
                  <tr>
                    <th style='background-color: #eaf2fa;padding: 15px;'>Phone number</th>
                  </tr>
                  <tr><td style='padding: 15px;'>0</td></tr>
                  <tr>
                    <th style='background-color: #eaf2fa;padding: 15px;'>Gender</th>
                  </tr>
                  <tr>
                    <td style='padding: 15px;'>:)</td>
                  </tr>
                  <tr>
                    <th style='background-color: #eaf2fa;padding: 15px;'>Background</th>
                  </tr>
                  <tr>
                    <td style='padding: 15px;'>background</td>
                  </tr>
                  <tr>
                    <th style='background-color: #eaf2fa;padding: 15px;'>Why do you want to become a developer?</th>
                  </tr>
                  <tr>
                    <td style='padding: 15px;'>12345</td>
                  </tr>
                  <tr>
                    <th style='background-color: #eaf2fa;padding: 15px;'>Any past coding experience?</th>
                  </tr>
                  <tr>
                    <td style='padding: 15px;'>12345</td>
                  </tr>
                  <tr>
                    <th style='background-color: #eaf2fa;padding: 15px;'>Select start date(s)</th>
                  </tr>
                  <tr>
                    <td style='padding: 15px;'>NOW</td>
                  </tr>
                  <tr>
                    <th style='background-color: #eaf2fa;padding: 15px;'>How did you hear about us?</th>
                  </tr>
                  <tr>
                    <td style='padding: 15px;'>Newspaper</td>
                  </tr>
                  <tr>
                    <th style='background-color: #eaf2fa;padding: 15px;'>Study confirmation</th>
                  </tr>
                  <tr>
                    <td style='padding: 15px;'>Yes</td>
                  </tr>
                  <tr>
                    <th style='background-color: #eaf2fa;padding: 15px;'>Age confirmation</th>
                  </tr>
                  <tr>
                    <td style='padding: 15px;'>Yes</td>
                  </tr>
                </table>
                <div style='padding: 20px; margin: 20px 0 20px 0; width: 200px; text-align: center; background-color: #D3D3D3'>
                    <a href='http://localhost:8080/applicants?id=12' style='font-size: 15px;'>View Applicant in Portal</a>
                </div>";
        $case = EmailContentViewHelper::ApplicantSubmission(self::$testData, self::$applicantId);
        self::assertEquals($expected, $case);
    }

    public function testApplicationSubmissionMalformed() {

        $malformedData = 25;
        $this->expectException(\Error::class);
        EmailContentViewHelper::ApplicantSubmission($malformedData);
    }

}
