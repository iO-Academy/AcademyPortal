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

    public function testValidateNewStageMalformed()
    {
        $this->expectException(\TypeError::class);
        StageValidator::ValidateNewStage(55);
    }

    public function testValidateExistingStageSuccess()
    {
        $stage = ['id' => 1, 'title' => 'Attending', 'order' => 7, 'student' => true];
        $result = StageValidator::validateExistingStage($stage);
        $this->assertEquals($result, true);
    }

    public function testValidateExistingStageMalformed()
    {
        $this->expectException(\TypeError::class);
        StageValidator::ValidateExistingStage(55);
    }
}
