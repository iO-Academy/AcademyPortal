<?php

namespace Tests\Controllers;

use Portal\Controllers\API\CompanyDetailsModalController;
use Portal\Models\HiringPartnerModel;
use Tests\TestCase;

class CompanyDetailsModalControllerTest extends TestCase
{
    public function testConstruct()
    {
        $mockModel = $this->createMock(HiringPartnerModel::class);
        $case = new CompanyDetailsModalController($mockModel);
        $expected = CompanyDetailsModalController::class;
        $this->assertInstanceOf($expected, $case);
    }
}
