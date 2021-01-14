<?php

namespace Tests\Controllers\FrontEnd;

use Tests\TestCase;
use Portal\Controllers\FrontEnd\RegisterPageController;
use Slim\Views\PhpRenderer;

class RegisterPageControllerTest extends TestCase
{
    public function testConstruct()
    {
        $stub = $this->createMock(PhpRenderer::class);
        $password = 'password';

        $case = new RegisterPageController($stub, $password);
        $expected = RegisterPageController::class;
        $this->assertInstanceOf($expected, $case);
    }
}
