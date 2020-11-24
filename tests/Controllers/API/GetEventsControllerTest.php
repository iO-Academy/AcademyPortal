<?php

namespace Tests\Controllers\API;

use Tests\TestCase;
use Portal\Controllers\API\GetEventsController;
use Portal\Models\EventModel;

class GetEventsControllerTest extends TestCase
{

    public function testConstruct()
    {
        $eventModel = $this->createMock(EventModel::class);

        $case = new GetEventsController($eventModel);
        $expected = GetEventsController::class;
        $this->assertInstanceOf($expected, $case);
    }
}
