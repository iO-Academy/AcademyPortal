<?php

namespace Tests\Controllers\API;

use Tests\TestCase;
use Portal\Models\HiringPartnerModel;
use Portal\Controllers\API\GetHiringPartnersController;

class GetHiringPartnerControllerTest extends TestCase
{
    public function testInstanceOfTheRightClass()
    {
        $hiringPartnerModel = $this->createMock(HiringPartnerModel::class);

        $case = new GetHiringPartnersController($hiringPartnerModel);
        $expected = GetHiringPartnersController::class;
        $this->assertInstanceOf($expected, $case);
    }
}
