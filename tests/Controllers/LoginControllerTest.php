<?php

use PHPUnit\Framework\TestCase;
use Portal\Controllers\LoginController;
use Portal\Models\UserModel;

class LoginControllerTest extends TestCase
{
    function testConstruct()
    {
        $stub = $this->createMock(UserModel::class);

        $case = new LoginController($stub);
        $expected = LoginController::class;
        $this->assertInstanceOf($expected, $case);
    }
};