<?php

namespace Tests\Validators;

use Portal\Validators\OptionsValidator;
use Tests\TestCase;

class OptionsValidatorTest extends TestCase
{
    public function testvalidateOptionSuccess()
    {
        $option = ['stageId' => 1, 'option' => 'Option 1'];
        $result = OptionsValidator::validateOption($option);
        $this->assertEquals($result, true);
    }

    public function testvalidateOptionFailureTitleExists()
    {
        $option = ['stageId' => 1, 'option' => ''];
        $result = OptionsValidator::validateOption($option);
        $this->assertEquals($result, false);
    }

    public function testvalidateOptionFailureIdNumber()
    {
        $option = ['stageId' => 'j', 'option' => 'Option 1'];
        $result = OptionsValidator::validateOption($option);
        $this->assertEquals($result, false);
    }

    public function testvalidateOptionFailureIdExists()
    {
        $option = ['stageId' => '', 'option' => 'Option 1'];
        $result = OptionsValidator::validateOption($option);
        $this->assertEquals($result, false);
    }

    public function testvalidateOptionMalformed()
    {
        $option = 'hello';
        $this->expectException(\TypeError::class);
        OptionsValidator::validateOption($option);
    }
}
