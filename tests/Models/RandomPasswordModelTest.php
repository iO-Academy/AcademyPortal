<?php

namespace Tests\Models;

use PHPUnit\Framework\TestCase;
use Portal\Models\RandomPasswordModel;

class RandomPasswordModelTest extends TestCase
{
    function testConstruct(){
        $password = new RandomPasswordModel();
        $case = gettype($password());
        $expected = 'string';
        $this->assertEquals($expected, $case);
    }
}