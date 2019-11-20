<?php

namespace Tests\Controllers;

use Portal\Controllers\CompanyDetailsModalController;
use Portal\Models\HiringPartnerModel;

class CompanyDetailsModalControllerTest extends \PHPUnit_Framework_TestCase
{
    public function testConstruct()
    {
        $mockModel = $this->createMock(HiringPartnerModel::class);
        $case = new CompanyDetailsModalController($mockModel);
        $expected = CompanyDetailsModalController::class;
        $this->assertInstanceOf($expected, $case);
    }
}
