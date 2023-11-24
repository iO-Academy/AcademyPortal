<?php

namespace Tests\Controllers\FrontEnd;

use Portal\Controllers\FrontEnd\CalendarPageController;
use Tests\TestCase;
use Slim\Views\PhpRenderer;

class CalendarPageControllerTest extends TestCase
{
    public function testConstruct()
    {
        $renderer = $this->createMock(PhpRenderer::class);

        $case = new CalendarPageController($renderer);
        $expected = CalendarPageController::class;
        $this->assertInstanceOf($expected, $case);
    }
}
