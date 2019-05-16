<?php

use PHPUnit\Framework\TestCase;
use Portal\Models\HiringPartnerModel;
use Portal\Controllers\GetHiringPartnerController;

class GetHiringPartnerControllerTest extends TestCase
{
    function testInstanceOfTheRightClass()
    {
        $hiringPartnerModel = $this->createMock(HiringPartnerModel::class);

        $case = new GetHiringPartnerController($hiringPartnerModel);
        $expected = GetHiringPartnerController::class;
        $this->assertInstanceOf($expected, $case);
    }
}
