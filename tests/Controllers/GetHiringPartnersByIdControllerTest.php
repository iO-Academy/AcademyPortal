<?php

namespace Tests\Controllers;

use Portal\Controllers\GetHiringPartnersByIdController;
use Portal\Models\EventModel;
use Portal\Models\HiringPartnerModel;

class GetHiringPartnersByIdControllerTest extends \PHPUnit_Framework_TestCase
{
    public function testConstruct()
    {
        $mockHiringPartnerModel = $this->createMock(HiringPartnerModel::class);
        $mockEventModel = $this->createMock(EventModel::class);
        $case = new GetHiringPartnersByIdController($mockHiringPartnerModel, $mockEventModel);
        $expected = GetHiringPartnersByIdController::class;
        $this->assertInstanceOf($expected, $case);
    }
}
