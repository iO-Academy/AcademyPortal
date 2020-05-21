<?php

namespace Tests\ViewHelpers;

use PHPUnit\Framework\TestCase;
use Portal\ViewHelpers\CompanySizeViewHelper;

class CompanySizeViewHelperTest extends TestCase
{
    public function testSuccessCompanySizeDropdown()
    {
        $expected = '<option value="1">1</option><option value="2">2</option>';

        $data = [
            'companySize' => [
                ['id' => 1, 'size' => 1],
                ['id' => 2, 'size' => 2]
            ]
        ];
        $result = CompanySizeViewHelper::companySizeDropdown($data);
        $this->assertEquals($expected, $result);
    }

    public function testFailureCompanySizeDropdownIncorrectDataFormat()
    {
        $result = CompanySizeViewHelper::companySizeDropdown([]);
        $this->assertEquals('', $result);
    }

    public function testFailureCompanySizeDropdownIncorrectDataFormat2()
    {
        $data = [
            'companySize' => []
        ];
        $result = CompanySizeViewHelper::companySizeDropdown($data);
        $this->assertEquals('', $result);
    }
}
