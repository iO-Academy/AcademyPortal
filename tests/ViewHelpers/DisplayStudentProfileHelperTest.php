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
        $this->assertEquals($expected, $result);
    }

    public function testDisplayEditButtonOrQuestionMarkSuccessFalse()
    {
        $islocked = 0;
        $fieldname = 'test';
        $expected = '<button data-selector="' . 'test' . '" 
                class="btn btn-primary btn-sm ' . 'test' . 'EditButton editbutton" 
                id="' . 'test' . 'EditButton">Edit</button>';
        $result = DisplayStudentProfileViewHelper::displayEditButtonOrQuestionMark($islocked, $fieldname);
        $this->assertEquals($expected, $result);
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

    public function testGetDetailsSuccessTrue()
    {
        $check = 1;
        $expected = 'Yes';
        $result = DisplayStudentProfileViewHelper::studentChecks($check);
        $this->assertEquals($expected, $result);
    }

    public function testGetDetailsSuccessFalse()
    {
        $check = 0;
        $expected = 'No';
        $result = DisplayStudentProfileViewHelper::studentChecks($check);
        $this->assertEquals($expected, $result);
    }

    public function testGetDetailsMalformed()
    {
        $check = [];
        $this->expectException(\TypeError::class);
        $result = DisplayStudentProfileViewHelper::studentChecks($check);
    }

    public function testLaptopRequiredSuccessTrue()
    {
        $required = 1;
        $expected = 'Yes';
        $result = DisplayStudentProfileViewHelper::laptopRequired($required);
        $this->assertEquals($expected, $result);
    }

    public function testLaptopRequiredSuccessFalse()
    {
        $required = 0;
        $expected = 'No';
        $result = DisplayStudentProfileViewHelper::laptopRequired($required);
        $this->assertEquals($expected, $result);
    }

    public function testLaptopRequiredMalformed()
    {
        $required = [];
        $this->expectException(\TypeError::class);
        $result = DisplayStudentProfileViewHelper::laptopRequired($required);
    }
}
