<?php

namespace Tests\Validators;

use Portal\Validators\IntegerValidator;
use Tests\TestCase;

class IntegerValidatorTest extends TestCase
{
    /**
     * checks input matches expected when input is an int within accepted range
     * @throws \Exception
     */
    public function testSuccessIntegerValidator()
    {
        $expected = 5;
        $input = 5;
        $case = IntegerValidator::validateInteger($input, 1, 999);
        $this->assertEquals($expected, $case);
    }


    /**
     * expects exception when int is outside of range
     * @return void
     * @throws \Exception
     */
    public function testFailureIntegerValidator()
    {
        $input = 10009;
        $this->expectException(\Exception::class);
        IntegerValidator::validateInteger($input, 1, 999);
    }


    /**
     * expects exception when input is not an int
     * @return void
     * @throws \Exception
     */
    public function testMalformedIntegerValidator()
    {
        $input = "Helloooo";
        $this->expectException(\TypeError::class);
        IntegerValidator::validateInteger($input, 1, 999);
    }
}
