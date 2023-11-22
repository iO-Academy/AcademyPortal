<?php

namespace Tests\ViewHelpers;

use Portal\ViewHelpers\DisplayStudentProfileViewHelper;
use PHPUnit\Framework\TestCase;

class DisplayStudentProfileHelperTest extends TestCase
{
    public function testDisplayEditButtonOrQuestionMarkSuccessTrue()
    {
        $islocked = 1;
        $fieldname = 'test';
        $expected = '<div><span 
            class="bi bi-question-circle"
            data-toggle="tooltip"
            data-placement="right" 
            title="This field has been locked by iO, please contact us if it is incorrect"
            ></div>';
        $result = DisplayStudentProfileViewHelper::displayEditButtonOrQuestionMark($islocked, $fieldname);
        $this->assertSame($expected, $result);
    }

    public function testDisplayEditButtonOrQuestionMarkSuccessFalse()
    {
        $islocked = 0;
        $fieldname = 'test';
        $expected = '<button data-selector="test" 
                class="btn btn-primary btn-sm testEditButton editbutton" 
                id="testEditButton">Edit</button>';
        $result = DisplayStudentProfileViewHelper::displayEditButtonOrQuestionMark($islocked, $fieldname);
        $this->assertSame($expected, $result);
    }

    public function testDisplayEditButtonOrQuestionMarkMalformedFieldName()
    {
        $islocked = 0;
        $fieldname = [];
        $this->expectException(\TypeError::class);
        $result = DisplayStudentProfileViewHelper::displayEditButtonOrQuestionMark($islocked, $fieldname);
    }

    public function testDisplayEditButtonOrQuestionMarkMalformedIsLocked()
    {
        $islocked = [];
        $fieldname = 'string';
        $this->expectException(\TypeError::class);
        $result = DisplayStudentProfileViewHelper::displayEditButtonOrQuestionMark($islocked, $fieldname);
    }

    public function testConvertBooleanToYesOrNoSuccessTrue()
    {
        $boolValue = 1;
        $expected = 'Yes';
        $result = DisplayStudentProfileViewHelper::convertBooleanToYesOrNo($boolValue);
        $this->assertSame($expected, $result);
    }

    public function testConvertBooleanToYesOrNoSuccessFalse()
    {
        $boolValue = 0;
        $expected = 'No';
        $result = DisplayStudentProfileViewHelper::convertBooleanToYesOrNo($boolValue);
        $this->assertSame($expected, $result);
    }

    public function testConvertBooleanToYesOrNoMalformed()
    {
        $boolValue = [];
        $this->expectException(\TypeError::class);
        $result = DisplayStudentProfileViewHelper::convertBooleanToYesOrNo($boolValue);
    }

    public function testConvertFieldToYesNoOrEmptyStringSuccessEmptyString()
    {
        $fieldValue = null;
        $expected = '';
        $result = DisplayStudentProfileViewHelper::convertFieldToYesNoOrEmptyString($fieldValue);
        $this->assertEquals($expected, $result);
    }

    public function testConvertFieldToYesNoOrEmptyStringSuccessTrue()
    {
        $fieldValue = 1;
        $expected = 'Yes';
        $result = DisplayStudentProfileViewHelper::convertFieldToYesNoOrEmptyString($fieldValue);
        $this->assertSame($expected, $result);
    }

    public function testConvertFieldToYesNoOrEmptyStringSuccessFalse()
    {
        $fieldValue = 0;
        $expected = 'No';
        $result = DisplayStudentProfileViewHelper::convertFieldToYesNoOrEmptyString($fieldValue);
        $this->assertSame($expected, $result);
    }

    public function testConvertFieldToYesNoOrEmptyStringMalformed()
    {
        $fieldValue = [];
        $this->expectException(\TypeError::class);
        $result = DisplayStudentProfileViewHelper::convertFieldToYesNoOrEmptyString($fieldValue);
    }
}
