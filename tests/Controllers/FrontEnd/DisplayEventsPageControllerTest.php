<?php

namespace Tests\Controllers\FrontEnd;

use Tests\TestCase;
use Portal\Controllers\FrontEnd\DisplayEventsPageController;
use Portal\Models\EventModel;
use Slim\Views\PhpRenderer;

class DisplayEventsPageControllerTest extends TestCase
{

    public function testConstruct()
    {
        $mockRender = $this->createMock(PhpRenderer::class);
        $mockModel = $this->createMock(EventModel::class);
        $case = new DisplayEventsPageController($mockRender, $mockModel);
        $expected = DisplayEventsPageController::class;
        $this->assertInstanceOf($expected, $case);
    }
}
