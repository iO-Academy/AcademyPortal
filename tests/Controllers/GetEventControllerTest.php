<?php

namespace Tests\Controllers;

use PHPUnit\Framework\TestCase;
use Portal\Controllers\GetEventController;
use Portal\Models\EventModel;

class GetEventControllerTest extends TestCase
{

    public function testConstruct()
    {
        $eventModel = $this->createMock(EventModel::class);

        $case = new GetEventController($eventModel);
        $expected = GetEventController::class;
        $this->assertInstanceOf($expected, $case);
    }
}
