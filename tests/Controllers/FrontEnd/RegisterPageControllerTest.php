<?php

namespace Tests\Controllers\FrontEnd;

use Portal\Models\RandomPasswordModel;
use Tests\TestCase;
use Portal\Controllers\FrontEnd\RegisterPageController;
use Slim\Views\PhpRenderer;

class RegisterPageControllerTest extends TestCase
{
    public function testConstruct()
    {
        $stub = $this->createMock(PhpRenderer::class);
        $password = $this->createMock(RandomPasswordModel::class);

        $case = new RegisterPageController($stub, $password);
        $expected = RegisterPageController::class;
        $this->assertInstanceOf($expected, $case);
    }
}
