<?php

namespace Tests\Validators;

use Portal\Validators\GithubEducationValidator;
use Tests\TestCase;

class GithubEducationValidatorTest extends TestCase
{
    public function testGithubEducationValidatorSuccess()
    {
        $url = 'https://education.github.com/student/verify?school_id=22531&';
        $url .= 'student_id=46&signature=908202655653833e97a0c5c7e8379f7c935938d5e3f79d961348acd886349b51';
        $result = GithubEducationValidator::validate($url);
        $this->assertEquals($result, true);
    }

    public function testGithubEducationValidatorFailure()
    {
        $url = 'https://education.github.com/student/verify?';
        $url .= 'school_id=22531&student_id=00&signature=00';
        $result = GithubEducationValidator::validate($url);
        $this->assertEquals($result, true);
    }

    public function testGitHubEducationValidatorMalformed()
    {
        $url = [1];
        $this->expectException(\TypeError::class);
        GithubEducationValidator::validate($url);
    }
}
