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

    public function testvalidateOptionUpdateFailure()
    {
        $option = ['optionId' => 1, 'optionTitle' => ''];
        $result = OptionsValidator::validateOptionUpdate($option);
        $this->assertEquals($result, false);
    }

    // public function testvalidateOptionAddSuccess()
    // {
        
    // }

    // public function testvalidateOptionAddFailure()
    // {
        
    // }
}
