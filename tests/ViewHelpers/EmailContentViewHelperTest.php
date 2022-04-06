<?php

namespace Tests\ViewHelpers;

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


    public static function testApplicantSubmissionSuccess() {
        $expected = '';
        $case = EmailContentViewHelper::ApplicantSubmission(self::$testData);
        self::assertEquals($expected, $case);
    }

}
