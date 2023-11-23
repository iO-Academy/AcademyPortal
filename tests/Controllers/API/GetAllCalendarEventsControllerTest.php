<?php

namespace Tests\Controllers\API;

use Portal\Controllers\API\GetAllCalendarEventsController;
use Portal\Models\EventModel;
use Tests\TestCase;

class GetAllCalendarEventsControllerTest extends TestCase
{
    public function testConstruct()
    {
        $eventModel = $this->createMock(EventModel::class);

        $case = new GetAllCalendarEventsController($eventModel);
        $expected = GetAllCalendarEventsController::class;
        $this->assertInstanceOf($expected, $case);
    }
}
