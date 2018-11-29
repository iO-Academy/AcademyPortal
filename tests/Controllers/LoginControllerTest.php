<?php

use PHPUnit\Framework\TestCase;
use Portal\Controllers\LoginController;
use Portal\Models\UserModel;

class LoginControllerTest extends TestCase
{
    function testConstruct()
    {
        $userModel = $this->createMock(UserModel::class);

        $case = new LoginController($userModel);
        $expected = LoginController::class;
        $this->assertInstanceOf($expected, $case);
    }
};
