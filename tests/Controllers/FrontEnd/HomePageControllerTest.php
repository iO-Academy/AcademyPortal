<?php

namespace Tests\Controllers\FrontEnd;

use Tests\TestCase;
use Portal\Controllers\FrontEnd\HomePageController;
use Slim\Views\PhpRenderer;

class HomePageControllerTest extends TestCase
{
    public function testConstruct()
    {
        $stub = $this->createMock(PhpRenderer::class);

        $case = new HomePageController($stub);
        $expected = HomePageController::class;
        $this->assertInstanceOf($expected, $case);
    }
}
