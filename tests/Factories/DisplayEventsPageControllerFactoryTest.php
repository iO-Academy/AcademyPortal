<?php

namespace Test\Factories;

use PHPUnit\Framework\TestCase;
use Portal\Controllers\DisplayEventsPageController;
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
