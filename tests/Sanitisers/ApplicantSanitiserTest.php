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

    public function testSuccessIntSanitiseEdAid()
    {
        $savedProfileFieldEdAid = 800;
        $expectedOutput = 800;
        $actualOutput = ApplicantSanitiser::sanitiseEdAid($savedProfileFieldEdAid);
        $this->assertEquals($expectedOutput, $actualOutput);
    }

    public function testSuccessStringSanitiseEdAid()
    {
        $savedProfileFieldEdAid = '800';
        $expectedOutput = 800;
        $actualOutput = ApplicantSanitiser::sanitiseEdAid($savedProfileFieldEdAid);
        $this->assertEquals($expectedOutput, $actualOutput);
    }

    public function testSuccessNullSanitiseEdAid()
    {
        $savedProfileFieldEdAid = null;
        $expectedOutput = null;
        $actualOutput = ApplicantSanitiser::sanitiseEdAid($savedProfileFieldEdAid);
        $this->assertEquals($expectedOutput, $actualOutput);
    }

    public function testSuccessZeroSanitiseEdAid()
    {
        $savedProfileFieldEdAid = 0;
        $expectedOutput = null;
        $actualOutput = ApplicantSanitiser::sanitiseEdAid($savedProfileFieldEdAid);
        $this->assertEquals($expectedOutput, $actualOutput);
    }

    public function testSuccessIntSanitiseUpFront()
    {
        $savedProfileFieldUpFront = 800;
        $expectedOutput = 800;
        $actualOutput = ApplicantSanitiser::sanitiseUpFront($savedProfileFieldUpFront);
        $this->assertEquals($expectedOutput, $actualOutput);
    }

    public function testSuccessNumberStringSanitiseUpFront()
    {
        $savedProfileFieldUpFront = '800';
        $expectedOutput = 800;
        $actualOutput = ApplicantSanitiser::sanitiseUpFront($savedProfileFieldUpFront);
        $this->assertEquals($expectedOutput, $actualOutput);
    }

    public function testSuccessNullSanitiseUpFront()
    {
        $savedProfileFieldUpFront = null;
        $expectedOutput = null;
        $actualOutput = ApplicantSanitiser::sanitiseUpFront($savedProfileFieldUpFront);
        $this->assertEquals($expectedOutput, $actualOutput);
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
