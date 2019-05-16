<?php


namespace Tests\Controllers;


use PHPUnit\Framework\TestCase;
use Portal\Controllers\AssignMainContactController;
use Portal\Models\HiringPartnerContactsModel;

class AssignMainContactControllerTest extends TestCase
{
    function testConstructor()
    {
        $hiringPartnerContactsModel = $this->createMock(HiringPartnerContactsModel::class);
        $case = new AssignMainContactController($hiringPartnerContactsModel);
        $expected = AssignMainContactController::class;
        $this->assertInstanceOf($expected, $case);
    }
}