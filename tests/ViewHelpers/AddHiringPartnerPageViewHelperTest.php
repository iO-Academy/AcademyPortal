<?php

use PHPUnit\Framework\TestCase;
use Portal\ViewHelpers\AddHiringPartnerPageViewHelper;

class AddHiringPartnerPageViewHelperTest extends TestCase
{
    public $array = [
      ['id' => 1, 'size' => '<5'],
      ['id' => 2, 'size' => '5-25']
    ];

    public function testOutputSizeBrackets()
    {
        $case = AddHiringPartnerPageViewHelper::outputSizeBrackets($this->array);
        $this->assertEquals($case, '<option value="1"><5</option><option value="2">5-25</option>');
    }
}