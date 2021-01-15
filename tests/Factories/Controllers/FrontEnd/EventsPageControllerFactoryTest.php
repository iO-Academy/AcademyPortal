<?php

namespace Tests\Factories\Controllers\FrontEnd;

use Tests\TestCase;
use Portal\Controllers\FrontEnd\EventsPageController;
use Portal\Models\EventModel;
use Slim\Views\PhpRenderer;

class EventsPageControllerFactoryTest extends TestCase
{

    public function testDisplayEventsPageControllerFactory()
    {
        $renderer = $this->createMock(PhpRenderer::class);
        $model = $this->createMock(EventModel::class);
        $case = new EventsPageController($renderer, $model);
        $expected = EventsPageController::class;
        $this->assertInstanceOf($expected, $case);
    }
}
