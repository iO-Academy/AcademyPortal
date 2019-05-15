<?php

use PHPUnit\Framework\TestCase;
use Portal\Controllers\HomePageController;
use Slim\Views\PhpRenderer;

class HomePageControllerTest extends TestCase
{
    function testConstruct()
    {
        $stub = $this->createMock(PhpRenderer::class);

        $case = new HomePageController($stub);
        $expected = HomePageController::class;
        $this->assertInstanceOf($expected, $case);
    }
}

