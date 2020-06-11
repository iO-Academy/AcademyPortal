<?php

namespace Tests\ViewHelpers;

use PHPUnit\Framework\TestCase;
use Portal\ViewHelpers\LayoutViewHelper;

class LayoutViewHelperTest extends TestCase
{
    public function testSuccessOutputTitle()
    {
        $expected = '<title>Academy Portal | Page Name</title>';
        $actual = LayoutViewHelper::outputTitle('Page Name');
        $this->assertEquals($expected, $actual);
    }

    public function testSuccessEmptyOutputTitle()
    {
        $expected = '<title>Academy Portal</title>';
        $actual = LayoutViewHelper::outputTitle('');
        $this->assertEquals($expected, $actual);
    }

    public function testSuccessNoInputOutputTitle()
    {
        $expected = '<title>Academy Portal</title>';
        $actual = LayoutViewHelper::outputTitle();
        $this->assertEquals($expected, $actual);
    }
}
