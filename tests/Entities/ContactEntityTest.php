<?php


namespace Tests\Entities;

use \Exception;
use PHPUnit\Framework\TestCase;
use Portal\Entities\ContactEntity;
use TypeError;

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
            1);
        $characterLength = 255;
        $contactName = $newContact->getContactName();
        ContactEntity::ValidateExistsAndLength($contactName, $characterLength);
    }

    public function testConstructorFailure()
    {
        $this->expectException(Exception::class);
        $newContact = new ContactEntity(
            'John Doe',
            'johndoe@company.com',
            'CTO',
            '0412345678914398502481058',
            2,
            1);
    }

    public function testMandatoryFieldsOnly()
    {
        $newContact = new ContactEntity(
            'John Doe',
            'johndoe@company.com',
            '',
            '',
            3,
            0
        );
        $contactName = $newContact->getContactName();
        $this->assertEquals($contactName, 'Jone Doe');
    }
}