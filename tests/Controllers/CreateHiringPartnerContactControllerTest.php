<?php

use PHPUnit\Framework\TestCase;
use Portal\Models\HiringPartnerContactsModel;
use Portal\Controllers\CreateHiringPartnerContactController;

class CreateHiringPartnerContactControllerTest extends TestCase {

    function testConstruct()
    {
        $hiringPartnerModel = $this->createMock(HiringPartnerContactsModel::class);
        $case = new CreateHiringPartnerContactController($hiringPartnerModel);
        $expected = CreateHiringPartnerContactController::class;
        $this->assertInstanceOf($expected, $case);
    }
}