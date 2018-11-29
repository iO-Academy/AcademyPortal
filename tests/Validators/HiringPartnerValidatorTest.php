<?php

namespace Tests\Validators;


use PHPUnit\Framework\TestCase;
use Portal\Validators\HiringPartnerValidator;

class HiringPartnerValidatorTest extends TestCase
{

    public $hiringPartnerData = [
        "companyName" => "Mayden Academy",
        "size" => "3",
        "techStack" => "PHP and JS",
        "postcode" => "E4 0LY",
        "phoneNo" => "0930183",
        "url" => "http://www.google.com"
    ];

    public function testIsValidCompanySize()
    {
        $this->assertTrue(HiringPartnerValidator::isValidCompanySize(1, [1]));
    }

    public function testIsValidCompanySizeFailure()
    {
        $this->assertFalse(HiringPartnerValidator::isValidCompanySize(1, []));
    }

    public function testIsValidCompanySizeMalformed()
    {
        $this->expectException(\TypeError::class);
        $this->assertFalse(HiringPartnerValidator::isValidCompanySize([], []));
        $this->expectException(\TypeError::class);
        $this->assertFalse(HiringPartnerValidator::isValidCompanySize(1, 1));
    }

    public function testIsValidHiringPartnerSuccess()
    {
        $this->assertTrue(HiringPartnerValidator::isValidHiringPartner($this->hiringPartnerData));
    }

    public function testIsValidHiringPartnerFailure()
    {
        $HpData1 = $this->hiringPartnerData;
        $HpData1['companyName'] = 1;
        $this->assertFalse(HiringPartnerValidator::isValidHiringPartner($HpData1));

        $HpData2 = $this->hiringPartnerData;
        $HpData2['size'] = 'rgt';
        $this->assertFalse(HiringPartnerValidator::isValidHiringPartner($HpData2));

        $HpData3 = $this->hiringPartnerData;
        $HpData3['techStack'] = 1;
        $this->assertFalse(HiringPartnerValidator::isValidHiringPartner($HpData3));

        $HpData4 = $this->hiringPartnerData;
        $HpData4['postcode'] = 'hi mike!';
        $this->assertFalse(HiringPartnerValidator::isValidHiringPartner($HpData4));

        $HpData5 = $this->hiringPartnerData;
        $HpData5['phoneNo'] = 1;
        $this->assertFalse(HiringPartnerValidator::isValidHiringPartner($HpData5));

        $HpData6 = $this->hiringPartnerData;
        $HpData6['url'] = 'www.google.cxom';
        $this->assertFalse(HiringPartnerValidator::isValidHiringPartner($HpData6));
    }

    public function testIsValidHiringPartnerURLMalformed()
    {
        $HpData = $this->hiringPartnerData;
        $HpData['url'] = 1;
        $this->assertFalse(HiringPartnerValidator::isValidHiringPartner($HpData));
    }

    public function testIsValidHiringPartnerPostcodeMalformed()
    {
        $HpData = $this->hiringPartnerData;
        $HpData['postcode'] = 1;
        $this->assertFalse(HiringPartnerValidator::isValidHiringPartner($HpData));
    }

    public function testisValidURLSuccess()
    {
        $url = 'http://www.google.com';
        $this->assertTrue(HiringPartnerValidator::isValidURL($url));
    }

    public function testisValidURLFailure()
    {
        $url = 'www.google.xom';
        $this->assertFalse(HiringPartnerValidator::isValidURL($url));
    }

    public function testisValidURLMalformed()
    {
        $url = [];
        $this->assertFalse(HiringPartnerValidator::isValidURL($url));
    }


}