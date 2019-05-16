<?php

use PHPUnit\Framework\TestCase;

class HiringPartnerContactEntityTest extends TestCase
{
public function testValidateExistsAndLengthSuccess(){
$characterLength = 255;
$contactName = 'Fred Fred';
$result = \Portal\Entities\HiringPartnerEntity::ValidateExistsAndLength($contactName, $characterLength);
$this->assertEquals($result, 'Fred Fred');
}

public function testValidateExistsAndLengthEmptyFailure(){
$characterLength = 255;
$contactName = '';
$this->expectException(Exception::class);
\Portal\Entities\HiringPartnerEntity::ValidateExistsAndLength($contactName, $characterLength);
}

public function testValidateExistsAndLengthLongFailure(){
$characterLength = 1;
$contactEmail = 'fred@fred.com';
$this->expectException(Exception::class);
\Portal\Entities\HiringPartnerEntity::ValidateExistsAndLength($contactEmail, $characterLength);
}

public function testValidateExistsAndLengthMalform(){
$characterLength = 10;
$contactEmail = [56,54,36];
$this->expectException(TypeError::class);
\Portal\Entities\HiringPartnerEntity::ValidateExistsAndLength($contactEmail, $characterLength);
}

public function testValidateLengthSuccess(){
$characterLength = 20;
$phoneNumber = '';
$result = \Portal\Entities\HiringPartnerEntity::ValidateLength($phoneNumber, $characterLength);
$this->assertEquals($result, null);
}

public function testValidateLengthFailure(){
$characterLength = 20;
$phoneNumber = '000000000000000000000';
$this->expectException(Exception::class);
\Portal\Entities\HiringPartnerEntity::ValidateLength($phoneNumber, $characterLength);
}

public function testValidateLengthMalform(){
$characterLength = 20;
$phoneNumber = [56,54,36];
$this->expectException(TypeError::class);
\Portal\Entities\HiringPartnerEntity::ValidateLength($phoneNumber, $characterLength);
}

public function testGetContactNameSuccess(){
$company = new \Portal\Entities\HiringPartnerContactEntity('Fred Fred', 'fred@fred.com', 'big boss', '01225 888888', '1');
$result = $company->getContactName();
$this->assertEquals($result, 'Fred Fred');
}

public function testGetContactEmailSuccess(){
$company = new \Portal\Entities\HiringPartnerContactEntity('Fred Fred', 'fred@fred.com', 'big boss', '01225 888888', '1');
$result = $company->getContactEmail();
$this->assertEquals($result, 'fred@fred.com');
}

public function testGetJobTitleSuccess(){
$company = new \Portal\Entities\HiringPartnerContactEntity('Fred Fred', 'fred@fred.com', 'big boss', '01225 888888', '1');
$result = $company->getJobTitle();
$this->assertEquals($result, 'big boss');
}

public function testGetPhoneNumberSuccess(){
$company = new \Portal\Entities\HiringPartnerContactEntity('Fred Fred', 'fred@fred.com', 'big boss', '01225 888888', '1');
$result = $company->getPhoneNumber();
$this->assertEquals($result, '01225 888888');
}

public function testGetCompanyIdSuccess(){
$company = new \Portal\Entities\HiringPartnerContactEntity('Fred Fred', 'fred@fred.com', 'big boss', '01225 888888', '1');
$result = $company->getCompanyId();
$this->assertEquals($result, 1);
}
}