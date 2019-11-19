<?php

namespace Test\Entities;

use \Exception;
use PHPUnit\Framework\TestCase;
use TypeError;

class HiringPartnerEntityTest extends TestCase
{
    public function testValidateExistsAndLengthSuccess()
    {
        $characterLength = 255;
        $companyName = 'TechHub';
        $result = \Portal\Entities\HiringPartnerEntity::ValidateExistsAndLength($companyName, $characterLength);
        $this->assertEquals($result, 'TechHub');
    }

    public function testValidateExistsAndLengthEmptyFailure()
    {
        $characterLength = 255;
        $companyName = '';
        $this->expectException(Exception::class);
        \Portal\Entities\HiringPartnerEntity::ValidateExistsAndLength($companyName, $characterLength);
    }

    public function testValidateExistsAndLengthLongFailure()
    {
        $characterLength = 10;
        $postcode = 'BA2BA2 4BB4BB';
        $this->expectException(Exception::class);
        \Portal\Entities\HiringPartnerEntity::ValidateExistsAndLength($postcode, $characterLength);
    }

    public function testValidateExistsAndLengthMalform()
    {
        $characterLength = 10;
        $postcode = [56,54,36];
        $this->expectException(TypeError::class);
        \Portal\Entities\HiringPartnerEntity::ValidateExistsAndLength($postcode, $characterLength);
    }

    public function testValidateLengthSuccess()
    {
        $characterLength = 20;
        $phoneNumber = '';
        $result = \Portal\Entities\HiringPartnerEntity::ValidateLength($phoneNumber, $characterLength);
        $this->assertEquals($result, null);
    }

    public function testValidateLengthFailure()
    {
        $characterLength = 20;
        $phoneNumber = '000000000000000000000';
        $this->expectException(Exception::class);
        \Portal\Entities\HiringPartnerEntity::ValidateLength($phoneNumber, $characterLength);
    }

    public function testValidateLengthMalform()
    {
        $characterLength = 20;
        $phoneNumber = [56,54,36];
        $this->expectException(TypeError::class);
        \Portal\Entities\HiringPartnerEntity::ValidateLength($phoneNumber, $characterLength);
    }

    public function testGetCompanyIdSuccess()
    {
        $company = new \Portal\Entities\HiringPartnerEntity(
            1,
            'TechHub',
            2,
            'CSS',
            'BA2 4DD',
            '01225 888888',
            'www.techhub.com'
        );
        $result = $company->getCompanyId();
        $this->assertEquals($result, 1);
    }

    public function testGetCompanyNameSuccess()
    {
        $company = new \Portal\Entities\HiringPartnerEntity(
            1,
            'TechHub',
            2,
            'CSS',
            'BA2 4DD',
            '01225 888888',
            'www.techhub.com'
        );
        $result = $company->getCompanyName();
        $this->assertEquals($result, 'TechHub');
    }

    public function testGetCompanySizeSuccess()
    {
        $company = new \Portal\Entities\HiringPartnerEntity(
            1,
            'TechHub',
            2,
            'CSS',
            'BA2 4DD',
            '01225 888888',
            'www.techhub.com'
        );
        $result = $company->getCompanySize();
        $this->assertEquals($result, 2);
    }

    public function testGetTechStackSuccess()
    {
        $company = new \Portal\Entities\HiringPartnerEntity(
            1,
            'TechHub',
            2,
            'CSS',
            'BA2 4DD',
            '01225 888888',
            'www.techhub.com'
        );
        $result = $company->getTechStack();
        $this->assertEquals($result, 'CSS');
    }

    public function testGetPostcodeSuccess()
    {
        $company = new \Portal\Entities\HiringPartnerEntity(
            1,
            'TechHub',
            2,
            'CSS',
            'BA2 4DD',
            '01225 888888',
            'www.techhub.com'
        );
        $result = $company->getPostcode();
        $this->assertEquals($result, 'BA2 4DD');
    }

    public function testGetPhoneNumberSuccess()
    {
        $company = new \Portal\Entities\HiringPartnerEntity(
            1,
            'TechHub',
            2,
            'CSS',
            'BA2 4DD',
            '01225 888888',
            'www.techhub.com'
        );
        $result = $company->getPhoneNumber();
        $this->assertEquals($result, '01225 888888');
    }

    public function testGetWebsiteURLSuccess()
    {
        $company = new \Portal\Entities\HiringPartnerEntity(
            1,
            'TechHub',
            2,
            'CSS',
            'BA2 4DD',
            '01225 888888',
            'www.techhub.com'
        );
        $result = $company->getCompanySize();
        $this->assertEquals($result, 2);
    }
}
