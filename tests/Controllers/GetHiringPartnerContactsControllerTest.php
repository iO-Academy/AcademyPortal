<?php

use PHPUnit\Framework\TestCase;
use Portal\Models\HiringPartnerContactsModel;
use Portal\Controllers\GetHiringPartnerContactsController;

class GetHiringPartnerContactsControllerTest extends TestCase
{
    function testGetHiringPartnerContactsControllerSuccess()
    {
        $hiringPartnerContactsModel = $this->createMock(HiringPartnerContactsModel::class);
        $case = new GetHiringPartnerContactsController($hiringPartnerContactsModel);
        $expected = GetHiringPartnerController::class;
        $this->assertInstanceOf($expected, $case);
    }
}