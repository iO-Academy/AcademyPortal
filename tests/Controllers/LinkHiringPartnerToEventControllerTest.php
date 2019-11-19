<?php

namespace Tests\Controllers;

use PHPUnit\Framework\TestCase;
use Portal\Controllers\LinkHiringPartnerToEventController;
use Portal\Models\EventModel;

class LinkHiringPartnerToEventControllerTest extends TestCase
{
    public function testConstruct()
    {
        $eventModel = $this->createMock(EventModel::class);
        $case = new LinkHiringPartnerToEventController($eventModel);
        $expected = LinkHiringPartnerToEventController::class;
        $this->assertInstanceOf($expected, $case);
    }
}