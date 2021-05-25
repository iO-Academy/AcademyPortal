<?php

namespace Tests\Validators;

use Portal\Validators\StageValidator;
use Tests\TestCase;

class StageValidatorTest extends TestCase
{
    public function testValidateStage()
    {
        $this->markTestSkipped('Cannot unit test as method calls other methods');
    }

    public function testValidateNewStageSuccess()
    {
        $newStage = ['title' => 'New application', 'student' => false];
        $result = StageValidator::validateNewStage($newStage);
        $this->assertEquals($result, true);
    }
}
