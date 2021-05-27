<?php

namespace Tests\Validators;

use Portal\Validators\PleskValidator;
use Tests\TestCase;

class PleskValidatorTest extends TestCase
{
    public function testPleskValidatorSuccess()
    {
        $url = 'https://2021-chameleons.dev.io-academy.uk/';
        $result = PleskValidator::validate($url);
        $this->assertEquals($result, true);
    }

    public function testPleskValidatorFailure()
    {
        $url = 'https://2222-hello.dev.io-academy.uk/';
        $result = PleskValidator::validate($url);
        $this->assertEquals($result, true);
    }

    public function testPleskValidatorMalformed()
    {
        $arr = [1];
        $this->expectException(\TypeError::class);
        PleskValidator::validate($arr);
    }
}
