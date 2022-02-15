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
        $expected = '&lt;h1&gt;Hello World!&lt;/h1&gt;';
        $this->assertEquals($expected, $result);
    }

    public function testSanitiseStringSuccessNull()
    {
        $result = StringSanitiser::sanitiseString(null);
        $expected = '';
        $this->assertEquals($expected, $result);
    }

    public function testSanitiseStringFailure()
    {

        $int = 2;
        $result = StringSanitiser::sanitiseString($int);
        $expected = '2';
        $this->assertEquals($expected, $result);
    }

    public function testSanitiseStringMalform()
    {

        $arr = [];
        $this->expectException(\TypeError::class);
        StringSanitiser::sanitiseString($arr);
    }
}
