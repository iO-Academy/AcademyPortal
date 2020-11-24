<?php

namespace Tests\Controllers\API\API\API\API\API\API\API\API\API\API\API\API\API\API\API\API\API\API\API\FrontEnd;

use Tests\TestCase;
use Portal\Controllers\FrontEnd\RegisterController;
use Slim\Views\PhpRenderer;

class RegisterControllerTest extends TestCase
{
    public function testConstruct()
    {
        $stub = $this->createMock(PhpRenderer::class);
        $password = 'password';

        $case = new RegisterController($stub, $password);
        $expected = RegisterController::class;
        $this->assertInstanceOf($expected, $case);
    }
}
