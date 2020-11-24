<?php

namespace Tests\Controllers\API\API\API\API\API\API\API\API\API\API\API\API\API\API\API\API\API\API\API;

use Portal\Controllers\API\AddHiringPartnerToEventController;
use Portal\Models\EventModel;
use Tests\TestCase;

class AddHiringPartnerToEventControllerTest extends TestCase
{
    public function testConstruct()
    {
        $eventModel = $this->createMock(EventModel::class);
        $case = new AddHiringPartnerToEventController($eventModel);
        $expected = AddHiringPartnerToEventController::class;
        $this->assertInstanceOf($expected, $case);
    }
}
