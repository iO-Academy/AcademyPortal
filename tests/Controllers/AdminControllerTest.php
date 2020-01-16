<?php

namespace Tests\Controllers;

use Tests\TestCase;
use Portal\Controllers\AdminController;
use Slim\Views\PhpRenderer;

class AdminControllerTest extends TestCase
{
    public function testConstruct()
    {
        $renderer = $this->createMock(PhpRenderer::class);

        $case = new AdminController($renderer);
        $expected = AdminController::class;
        $this->assertInstanceOf($expected, $case);
    }
}
