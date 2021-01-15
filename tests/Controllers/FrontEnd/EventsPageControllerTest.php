<?php

namespace Tests\Controllers\FrontEnd;

use Tests\TestCase;
use Portal\Controllers\FrontEnd\EventsPageController;
use Portal\Models\EventModel;
use Slim\Views\PhpRenderer;

class EventsPageControllerTest extends TestCase
{

    public function testConstruct()
    {
        $mockRender = $this->createMock(PhpRenderer::class);
        $mockModel = $this->createMock(EventModel::class);
        $case = new EventsPageController($mockRender, $mockModel);
        $expected = EventsPageController::class;
        $this->assertInstanceOf($expected, $case);
    }
}
