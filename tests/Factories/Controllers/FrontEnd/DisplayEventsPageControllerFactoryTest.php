<?php

namespace Tests\Factories\Controllers\FrontEnd;

use Tests\TestCase;
use Portal\Controllers\FrontEnd\DisplayEventsPageController;
use Portal\Models\EventModel;
use Slim\Views\PhpRenderer;

class DisplayEventsPageControllerFactoryTest extends TestCase
{

    public function testDisplayEventsPageControllerFactory()
    {
        $renderer = $this->createMock(PhpRenderer::class);
        $model = $this->createMock(EventModel::class);
        $case = new DisplayEventsPageController($renderer, $model);
        $expected = DisplayEventsPageController::class;
        $this->assertInstanceOf($expected, $case);
    }
}
