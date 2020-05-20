<?php

namespace Tests\Validators;

use Portal\Validators\StringValidator;
use Tests\TestCase;

class StringValidatorTest extends TestCase
{
    public function testValidateExistsAndLength()
    {
        $characterLength = 255;
        $eventName = 'Hiring Event';
        $result = StringValidator::ValidateExistsAndLength($eventName, $characterLength);
        $this->assertEquals($result, 'Hiring Event');
    }

    public function testValidateExistsAndLengthFailure()
    {
        $characterLength = 20;
        $eventName = '';
        $this->expectException(\Exception::class);
        StringValidator::ValidateExistsAndLength($eventName, $characterLength);
    }

    public function testValidateExistsAndLengthLongFailure()
    {
        $characterLength = 20;
        $location = '1 Widcombe Cres, Bath BA2 6AH 1 Widcombe Cres, Bath BA2 6AH 1 Widcombe Cres, Bath BA2 6AH';
        $this->expectException(\Exception::class);
        StringValidator::ValidateExistsAndLength($location, $characterLength);
    }

    public function testValidateExistsAndLengthMalform()
    {
        $characterLength = 10;
        $name = [11, 22, 33];
        $this->expectException(\TypeError::class);
        StringValidator::ValidateExistsAndLength($name, $characterLength);
    }

    public function testValidateLengthSuccess()
    {
        $characterLength = 255;
        $location = '1 Widcombe Cres, Bath BA2 6AH';
        $result = StringValidator::ValidateLength($location, $characterLength);
        $this->assertEquals($result, '1 Widcombe Cres, Bath BA2 6AH');
    }

    public function testValidateLengthEmptySuccess()
    {
        $result = StringValidator::ValidateLength('', 1);
        $this->assertEquals($result, null);
    }

    public function testValidateLengthFailure()
    {
        $characterLength = 20;
        $location = '1 Widcombe Cres, Bath BA2 6AH 1 Widcombe Cres, Bath BA2 6AH 1 Widcombe Cres, Bath BA2 6AH';
        $this->expectException(\Exception::class);
        StringValidator::ValidateLength($location, $characterLength);
    }

    public function testValidateLengthMalform()
    {
        $characterLength = 20;
        $name = [11, 22, 33];
        $this->expectException(\TypeError::class);
        StringValidator::ValidateLength($name, $characterLength);
    }
}
