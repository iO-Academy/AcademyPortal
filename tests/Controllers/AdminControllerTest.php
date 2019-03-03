<?php

use PHPUnit\Framework\TestCase;
use Portal\Controllers\AdminController;
use Slim\Views\PhpRenderer;

class AdminControllerTest extends TestCase
{
    function testConstruct()
    {
        $renderer = $this->createMock(PhpRenderer::class);

        $case = new AdminController($renderer);
        $expected = AdminController::class;
        $this->assertInstanceOf($expected, $case);
        $this->assertInstanceOf($expected, $case);
    }
}

