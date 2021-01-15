<?php

namespace Tests\Controllers\FrontEnd;

use Tests\TestCase;
use Portal\Controllers\FrontEnd\AdminPageController;
use Slim\Views\PhpRenderer;

class AdminPageControllerTest extends TestCase
{
    public function testConstruct()
    {
        $renderer = $this->createMock(PhpRenderer::class);

        $case = new AdminPageController($renderer);
        $expected = AdminPageController::class;
        $this->assertInstanceOf($expected, $case);
    }
}
