<?php

namespace Tests\Controllers\API;

use Portal\Controllers\API\GetHiringPartnersByIdController;
use Portal\Models\EventModel;
use Portal\Models\HiringPartnerModel;
use Tests\TestCase;

class GetHiringPartnersByIdControllerTest extends TestCase
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
