<?php

namespace Tests\Sanitisers;

use Portal\Sanitisers\StringSanitiser;
use Tests\TestCase;

class StringSanitiserTest extends TestCase
{
    public function testSanitiseStringSuccess()
    {
        $str = '    <h1>Hello World!</h1>';
        $result = StringSanitiser::sanitiseString($str);
        $expected = 'Hello World!';
        $this->assertEquals($result, $expected);
    }

    public function testSanitiseStringSuccessNull()
    {
        $result = StringSanitiser::sanitiseString(null);
        $expected = '';
        $this->assertEquals($result, $expected);
    }

    public function testSanitiseStringFailure()
    {
        $arr = [];
        $this->expectException(\TypeError::class);
        StringSanitiser::sanitiseString($arr);
    }
}