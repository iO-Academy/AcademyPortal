<?php

namespace Tests\Entities;

use \Exception;
use Tests\TestCase;
use Portal\Entities\ContactEntity;

class ContactEntityTest extends TestCase
{
    public function testValidateExistsAndLengthSuccess()
    {
        $newContact = new ContactEntity(
            'John Doe',
            'johndoe@company.com',
            'CTO',
            '04123456789',
            2,
            1
        );
        $characterLength = 255;
        $contactName = $newContact->getContactName();
        $result = ContactEntity::ValidateExistsAndLength($contactName, $characterLength);
        $this->assertEquals('John Doe', $result);
    }

    public function testConstructorFailure()
    {
        $this->expectException(Exception::class);
        new ContactEntity(
            'John Doe',
            'johndoe@company.com',
            'CTO',
            '0412345678914398502481058',
            2,
            1
        );
    }

    public function testMandatoryFieldsOnlySuccess()
    {
        $actual = new ContactEntity(
            'John Doe',
            'johndoe@company.com',
            '',
            '',
            3,
            0
        );
        $this->assertInstanceOf(ContactEntity::class, $actual);
    }

    public function testGetContactName()
    {
        $newContact = new ContactEntity(
            'John Doe',
            'johndoe@company.com',
            'CTO',
            '04123456789',
            2,
            1
        );
        $expected = 'John Doe';
        $actual = $newContact->getContactName();
        $this->assertEquals($expected, $actual);
    }

    public function testGetContactEmail()
    {
        $newContact = new ContactEntity(
            'John Doe',
            'johndoe@company.com',
            'CTO',
            '04123456789',
            2,
            1
        );
        $expected = 'johndoe@company.com';
        $actual = $newContact->getContactEmail();
        $this->assertEquals($expected, $actual);
    }

    public function testGetJobTitle()
    {
        $newContact = new ContactEntity(
            'John Doe',
            'johndoe@company.com',
            'CTO',
            '04123456789',
            2,
            1
        );
        $expected = 'CTO';
        $actual = $newContact->getJobTitle();
        $this->assertEquals($expected, $actual);
    }

    public function testGetContactPhone()
    {
        $newContact = new ContactEntity(
            'John Doe',
            'johndoe@company.com',
            'CTO',
            '04123456789',
            2,
            1
        );
        $expected = '04123456789';
        $actual = $newContact->getContactPhone();
        $this->assertEquals($expected, $actual);
    }

    public function testGetHiringPartnerCompanyId()
    {
        $newContact = new ContactEntity(
            'John Doe',
            'johndoe@company.com',
            'CTO',
            '04123456789',
            23,
            1
        );
        $expected = 23;
        $actual = $newContact->getHiringPartnerCompanyId();
        $this->assertEquals($expected, $actual);
    }

    public function testGetPrimaryContact()
    {
        $newContact = new ContactEntity(
            'John Doe',
            'johndoe@company.com',
            'CTO',
            '04123456789',
            23,
            1
        );
        $expected = 1;
        $actual = $newContact->getPrimaryContact();
        $this->assertEquals($expected, $actual);
    }
}
