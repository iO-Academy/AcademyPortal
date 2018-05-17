<?php

namespace Tests\Controllers;

use PHPUnit\Framework\TestCase;
use Portal\Controllers\RegisterController;
use Portal\Models\RandomPasswordModel;
use Slim\Views\PhpRenderer;

class AdminControllerTest extends TestCase
{
    function testConstruct()
    {
        $stub = $this->createMock(PhpRenderer::class);
        $password = $this->createMock(RandomPasswordModel::class);

        $case = new RegisterController($stub, $password);
        $expected = RegisterController::class;
        $this->assertInstanceOf($expected, $case);
    }
}

