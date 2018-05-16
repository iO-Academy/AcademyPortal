<?php

use PHPUnit\Framework\TestCase;
use Portal\Controllers\AdminController as AdminController;

use Slim\Views\PhpRenderer;

class AdminControllerTest extends TestCase
{

    function testConstruct()
    {
        $stub = $this->createMock(PhpRenderer::class);

        $case = new AdminController($stub);
        $expected = AdminController::class;
        $this->assertInstanceOf($expected, $case);
    }
};

