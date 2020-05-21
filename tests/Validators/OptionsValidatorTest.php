<?php

namespace Tests\Validators;

use Portal\Validators\OptionsValidator;
use Tests\TestCase;

class OptionsValidatorTest extends TestCase
{
    public function testValidateOptionUpdateSuccess()
    {
        $option = ['optionId' => 1, 'optionTitle' => 'Option 1'];
        $result = OptionsValidator::validateOptionUpdate($option);
        $this->assertEquals($result, true);
    }

    public function testvalidateOptionUpdateFailureTitleExists()
    {
        $option = ['optionId' => 1, 'optionTitle' => ''];
        $result = OptionsValidator::validateOptionUpdate($option);
        $this->assertEquals($result, false);
    }
    
    public function testvalidateOptionUpdateFailureIdNumber()
    {
        $option = ['optionId' => 'l', 'optionTitle' => 'test past'];
        $result = OptionsValidator::validateOptionUpdate($option);
        $this->assertEquals($result, false);
    }
    
    public function testvalidateOptionUpdateFailureIdExists()
    {
        $option = ['optionId' => '', 'optionTitle' => 'test past'];
        $result = OptionsValidator::validateOptionUpdate($option);
        $this->assertEquals($result, false);
    }

    public function testvalidateOptionUpdateMalformed()
    {
        $option = 0.1223;
        $this->expectException(\TypeError::class);
        $result = OptionsValidator::validateOptionUpdate($option);
    }

    public function testvalidateOptionAddSuccess()
    {
        $option = ['stageId' => 1, 'title' => 'Option 1'];
        $result = OptionsValidator::validateOptionAdd($option);
        $this->assertEquals($result, true);
    }

    public function testvalidateOptionAddFailureTitleExists()
    {
        $option = ['stageId' => 1, 'title' => ''];
        $result = OptionsValidator::validateOptionAdd($option);
        $this->assertEquals($result, false);
    }

    public function testvalidateOptionAddFailureIdNumber()
    {
        $option = ['stageId' => 'j', 'title' => 'Option 1'];
        $result = OptionsValidator::validateOptionAdd($option);
        $this->assertEquals($result, false);
    }

    public function testvalidateOptionAddFailureIdExists()
    {
        $option = ['stageId' => '', 'title' => 'Option 1'];
        $result = OptionsValidator::validateOptionAdd($option);
        $this->assertEquals($result, false);
    }

    public function testvalidateOptionAddMalformed()
    {
        $option = 'hello';
        $this->expectException(\TypeError::class);
        $result = OptionsValidator::validateOptionAdd($option);
    }
}
