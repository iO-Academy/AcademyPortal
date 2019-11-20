<?php

namespace Tests\Controllers;

use PHPUnit\Framework\TestCase;
use Portal\Controllers\AddHiringPartnerToEventController;
use Portal\Models\EventModel;

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
