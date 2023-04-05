<?php

namespace Tests\Validators;


use Portal\Validators\IntegerValidator;
use Tests\TestCase;

class IntegerValidatorTest extends TestCase
{
    public function testSuccessIntegerValidator()
    {
        $expected = 5;
        $input = 5;
        $case = IntegerValidator::validateInteger($input, 1, 999);
        $this->assertEquals($expected, $case);
    }

    public function testFailureIntegerValidator()
    {
        $input = 10009;
        $this->expectException(\Exception::class);
        IntegerValidator::validateInteger($input, 1, 999);
    }

    public function testMalformedIntegerValidator()
    {
        $input = "Helloooo";
        $this->expectException(\TypeError::class);
        IntegerValidator::validateInteger($input, 1, 999);
    }
}