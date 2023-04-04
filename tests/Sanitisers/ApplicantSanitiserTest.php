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

    // sanitiseEdAid - if returns int
    public function testSuccessSanitiseEdAid()
    {
        $savedProfileFieldEdAid = 800;
        $expectedOutput = 800;
        $actualOutput = ApplicantSanitiser::sanitiseEdAid($savedProfileFieldEdAid);
        $this->assertEquals($expectedOutput, $actualOutput);
    }
    // sanitiseUpFront sanitiseLaptop sanitiseGitHubUsername
}
