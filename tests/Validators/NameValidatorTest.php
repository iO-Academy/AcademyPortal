<?php

namespace Tests\Validators;

use Portal\Validators\NameValidator;
use Tests\TestCase;

class NameValidatorTest extends TestCase
{
    public function testValidateNameSuccess()
    {
        $name = 'Ashley Coles';
        $result = NameValidator::validateName($name);
        $this->assertEquals($result, $name);
    }

    public function testValidateNameFailure()
    {
        $this->expectException(\Exception::class);
        NameValidator::validateName('$533Haha');
    }

    public function testValidateNameEmptyFailure()
    {
        $this->expectException(\Exception::class);
        NameValidator::validateName('');
    }

    public function testValidateNameMalformed()
    {
        $this->expectException(\typeError::class);
        NameValidator::validateName([1]);
    }
}
