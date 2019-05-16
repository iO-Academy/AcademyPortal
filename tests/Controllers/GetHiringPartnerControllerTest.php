<?php

use PHPUnit\Framework\TestCase;
use Portal\Models\HiringPartnerModel;
use Portal\Controllers\GetHiringPartnersController;

class GetHiringPartnerControllerTest extends TestCase
{
    function testInstanceOfTheRightClass()
    {
        $hiringPartnerModel = $this->createMock(HiringPartnerModel::class);

        $case = new GetHiringPartnersController($hiringPartnerModel);
        $expected = GetHiringPartnersController::class;
        $this->assertInstanceOf($expected, $case);
    }
}
