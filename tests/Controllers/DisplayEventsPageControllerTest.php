<?php

namespace Tests\Controllers;

use PHPUnit\Framework\TestCase;
use Portal\Controllers\DisplayEventsPageController;
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
