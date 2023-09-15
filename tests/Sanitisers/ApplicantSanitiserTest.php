<?php

namespace Portal\Sanitisers;

use Portal\Sanitisers\ApplicantSanitiser;
use Tests\TestCase;

class ApplicantSanitiserTest extends TestCase
{
    public function testSanitise()
    {
        $this->markTestSkipped('Cannot unit test as method calls other methods');
    }

    public function testSuccessNullSanitiseLaptop()
    {
        $savedProfileFieldLaptop = null;
        $expectedOutput = null;
        $actualOutput = ApplicantSanitiser::sanitiseLaptop($savedProfileFieldLaptop);
        $this->assertEquals($expectedOutput, $actualOutput);
    }

    public function testSuccessOneSanitiseOneLaptop()
    {
        $savedProfileFieldLaptop = 1;
        $expectedOutput = 1;
        $actualOutput = ApplicantSanitiser::sanitiseLaptop($savedProfileFieldLaptop);
        $this->assertEquals($expectedOutput, $actualOutput);
    }

    public function testSuccessZeroSanitiseLaptop()
    {
        $savedProfileFieldLaptop = 0;
        $expectedOutput = 0;
        $actualOutput = ApplicantSanitiser::sanitiseLaptop($savedProfileFieldLaptop);
        $this->assertEquals($expectedOutput, $actualOutput);
    }

    public function testSuccessStringSanitiseLaptop()
    {
        $savedProfileFieldLaptop = 'banana';
        $expectedOutput = 1;
        $actualOutput = ApplicantSanitiser::sanitiseLaptop($savedProfileFieldLaptop);
        $this->assertEquals($expectedOutput, $actualOutput);
    }

    public function testSuccessNonHtmlStringSanitiseGitHubUsername()
    {
        $savedProfileFieldGithubUsername = 'banana';
        $expectedOutput = 'banana';
        $actualOutput = ApplicantSanitiser::sanitiseGithubUsername($savedProfileFieldGithubUsername);
        $this->assertEquals($expectedOutput, $actualOutput);
    }

    public function testSuccessHtmlStringSanitiseGitHubUsername()
    {
        $savedProfileFieldGithubUsername = '<marquee>Hello</marquee>';
        $expectedOutput = '&lt;marquee&gt;Hello&lt;/marquee&gt;';
        $actualOutput = ApplicantSanitiser::sanitiseGithubUsername($savedProfileFieldGithubUsername);
        $this->assertEquals($expectedOutput, $actualOutput);
    }
}
