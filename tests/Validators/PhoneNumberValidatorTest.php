<?php

namespace Tests\Validators;

use Portal\Validators\PhoneNumberValidator;

class PhoneNumberValidatorTest extends \PHPUnit\Framework\TestCase
{

    public function testValidatePhoneNumberSuccess()
    {
        $numbers = ['786780670434', '+31 166 094'];
        foreach ($numbers as $number) {
            $result = PhoneNumberValidator::validatePhoneNumber($number);
            $this->assertEquals($result, $number);
        }
    }

    public function testValidatePhoneNumberFailure()
    {
        $this->expectException(\Exception::class);
        PhoneNumberValidator::validatePhoneNumber('7a86670434as');
    }

    public function testValidatePhoneNumberEmptyFailure()
    {
        $this->expectException(\Exception::class);
        PhoneNumberValidator::validatePhoneNumber('');
    }
}
