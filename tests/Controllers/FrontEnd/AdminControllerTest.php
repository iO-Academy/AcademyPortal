<?php

namespace Tests\Controllers\API\API\API\API\API\API\API\API\API\API\API\API\API\API\API\API\API\API\API\FrontEnd;

use Tests\TestCase;
use Portal\Controllers\FrontEnd\AdminController;
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
