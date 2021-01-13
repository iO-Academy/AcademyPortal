<?php

namespace Tests\Controllers\API;

use Portal\Controllers\API\GetCompanyDetailsModalController;
use Portal\Models\HiringPartnerModel;
use Tests\TestCase;

class GetCompanyDetailsModalControllerTest extends TestCase
{
    public function testConstruct()
    {
        $mockModel = $this->createMock(HiringPartnerModel::class);
        $case = new GetCompanyDetailsModalController($mockModel);
        $expected = GetCompanyDetailsModalController::class;
        $this->assertInstanceOf($expected, $case);
    }
}
