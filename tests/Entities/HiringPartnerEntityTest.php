<?php

use PHPUnit\Framework\TestCase;

class HiringPartnerEntityTest extends TestCase
{
    public function testValidateLengthSuccess(){
        $characterLength = 255;
        $companyName = 'TechHub';
        $result = \Portal\Entities\HiringPartnerEntity::validateLength($companyName, $characterLength);
        $this->assertEquals($result, 'TechHub');
}

    public function testValidateLengthEmptyFailure(){
        $characterLength = 255;
        $companyName = '';
        $this->expectException(Exception::class);
        \Portal\Entities\HiringPartnerEntity::validateLength($companyName, $characterLength);
    }

    public function testValidateLengthCharactersFailure(){
        $characterLength = 10;
        $postcode = 'BA2BA2 4BB4BB';
        $this->expectException(Exception::class);
        \Portal\Entities\HiringPartnerEntity::validateLength($postcode, $characterLength);
    }

    public function testValidateLengthMalform(){
        $characterLength = 10;
        $postcode = [56,54,36];
        $this->expectException(TypeError::class);
        \Portal\Entities\HiringPartnerEntity::validateLength($postcode, $characterLength);
    }

    public function testGetCompanyNameSuccess(){
        $company = new \Portal\Entities\HiringPartnerEntity('TechHub', 2, 'CSS', 'BA2 4DD', '01225 888888', 'www.techhub.com');
        $result = $company->getCompanyName();
        $this->assertEquals($result, 'TechHub');
    }

        public function testGetCompanySizeSuccess(){
        $company = new \Portal\Entities\HiringPartnerEntity('TechHub', 2, 'CSS', 'BA2 4DD', '01225 888888', 'www.techhub.com');
        $result = $company->getCompanySize();
        $this->assertEquals($result, 2);
    }

    public function testGetTechStackSuccess(){
        $company = new \Portal\Entities\HiringPartnerEntity('TechHub', 2, 'CSS', 'BA2 4DD', '01225 888888', 'www.techhub.com');
        $result = $company->getTechStack();
        $this->assertEquals($result, 'CSS');
    }

    public function testGetPostcodeSuccess(){
        $company = new \Portal\Entities\HiringPartnerEntity('TechHub', 2, 'CSS', 'BA2 4DD', '01225 888888', 'www.techhub.com');
        $result = $company->getPostcode();
        $this->assertEquals($result, 'BA2 4DD');
    }

    public function testGetPhoneNumberSuccess(){
        $company = new \Portal\Entities\HiringPartnerEntity('TechHub', 2, 'CSS', 'BA2 4DD', '01225 888888', 'www.techhub.com');
        $result = $company->getPhoneNumber();
        $this->assertEquals($result, '01225 888888');
    }

    public function testGetWebsiteURLSuccess(){
        $company = new \Portal\Entities\HiringPartnerEntity('TechHub', 2, 'CSS', 'BA2 4DD', '01225 888888', 'www.techhub.com');
        $result = $company->getCompanySize();
        $this->assertEquals($result, 2);
    }
}