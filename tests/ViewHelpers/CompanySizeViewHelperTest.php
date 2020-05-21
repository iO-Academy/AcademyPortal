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

    public function testFailureCompanySizeDropdown_incorrectDataFormat()
    {
        $this->expectException(\PHPUnit\Framework\Error\Notice::class);
        CompanySizeViewHelper::companySizeDropdown([]);
    }

    public function testFailureCompanySizeDropdown_incorrectDataFormat2()
    {
        $data = [
            'companySize' => [
                []
            ]
        ];
        $this->expectException(\PHPUnit\Framework\Error\Notice::class);
        CompanySizeViewHelper::companySizeDropdown($data);
    }
}
