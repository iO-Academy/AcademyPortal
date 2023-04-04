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

    public function testSuccessSanitiseEdAid_int()
    {
        $savedProfileFieldEdAid = 800;
        $expectedOutput = 800;
        $actualOutput = ApplicantSanitiser::sanitiseEdAid($savedProfileFieldEdAid);
        $this->assertEquals($expectedOutput, $actualOutput);
    }

    public function testSuccessSanitiseEdAid_numberString()
    {
        $savedProfileFieldEdAid = '800';
        $expectedOutput = 800;
        $actualOutput = ApplicantSanitiser::sanitiseEdAid($savedProfileFieldEdAid);
        $this->assertEquals($expectedOutput, $actualOutput);
    }

    public function testSuccessSanitiseEdAid_null()
    {
        $savedProfileFieldEdAid = null;
        $expectedOutput = null;
        $actualOutput = ApplicantSanitiser::sanitiseEdAid($savedProfileFieldEdAid);
        $this->assertEquals($expectedOutput, $actualOutput);
    }

    public function testSuccessSanitiseEdAid_zero()
    {
        $savedProfileFieldEdAid = 0;
        $expectedOutput = null;
        $actualOutput = ApplicantSanitiser::sanitiseEdAid($savedProfileFieldEdAid);
        $this->assertEquals($expectedOutput, $actualOutput);
    }
    
    public function testSuccessSanitiseUpFront_int()
    {
        $savedProfileFieldUpFront = 800;
        $expectedOutput = 800;
        $actualOutput = ApplicantSanitiser::sanitiseUpFront($savedProfileFieldUpFront);
        $this->assertEquals($expectedOutput, $actualOutput);
    }

    public function testSuccessSanitiseUpFront_numberString()
    {
        $savedProfileFieldUpFront = '800';
        $expectedOutput = 800;
        $actualOutput = ApplicantSanitiser::sanitiseUpFront($savedProfileFieldUpFront);
        $this->assertEquals($expectedOutput, $actualOutput);
    }

    public function testSuccessSanitiseUpFront_null()
    {
        $savedProfileFieldUpFront = null;
        $expectedOutput = null;
        $actualOutput = ApplicantSanitiser::sanitiseUpFront($savedProfileFieldUpFront);
        $this->assertEquals($expectedOutput, $actualOutput);
    }

    public function testSuccessSanitiseLaptop_null()
    {
        $savedProfileFieldLaptop = null;
        $expectedOutput = null;
        $actualOutput = ApplicantSanitiser::sanitiseLaptop($savedProfileFieldLaptop);
        $this->assertEquals($expectedOutput, $actualOutput);
    }

    public function testSuccessSanitiseOneLaptop_one()
    {
        $savedProfileFieldLaptop = 1;
        $expectedOutput = 1;
        $actualOutput = ApplicantSanitiser::sanitiseLaptop($savedProfileFieldLaptop);
        $this->assertEquals($expectedOutput, $actualOutput);
    }

    public function testSuccessSanitiseLaptop_zero()
    {
        $savedProfileFieldLaptop = 0;
        $expectedOutput = 0;
        $actualOutput = ApplicantSanitiser::sanitiseLaptop($savedProfileFieldLaptop);
        $this->assertEquals($expectedOutput, $actualOutput);
    }

    public function testSuccessSanitiseLaptop_string()
    {
        $savedProfileFieldLaptop = 'banana';
        $expectedOutput = 1;
        $actualOutput = ApplicantSanitiser::sanitiseLaptop($savedProfileFieldLaptop);
        $this->assertEquals($expectedOutput, $actualOutput);
    }

    public function testSuccessSanitiseGitHubUsername_nonHtmlString()
    {
        $savedProfileFieldGithubUsername = 'banana';
        $expectedOutput = 'banana';
        $actualOutput = ApplicantSanitiser::sanitiseGithubUsername($savedProfileFieldGithubUsername);
        $this->assertEquals($expectedOutput, $actualOutput);
    }

    public function testSuccessSanitiseGitHubUsername_HtmlString()
    {
        $savedProfileFieldGithubUsername = '<marquee>Hello</marquee>';
        $expectedOutput = '&lt;marquee&gt;Hello&lt;/marquee&gt;';
        $actualOutput = ApplicantSanitiser::sanitiseGithubUsername($savedProfileFieldGithubUsername);
        $this->assertEquals($expectedOutput, $actualOutput);
    }


    // sanitiseLaptop 
}
