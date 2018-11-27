<?php

namespace Tests\Controllers;

use PHPUnit\Framework\TestCase;
use Portal\Controllers\RegisterUserController;
use Portal\Models\UserModel;

class RegisterUserControllerTest extends TestCase
{
    private $mockUserModel;

    function SetUp()
    {
        $this->mockUserModel = $this->createMock(UserModel::class);
    }

    function test_Construct()
    {
        $case = new RegisterUserController($this->mockUserModel);
        $expected = RegisterUserController::class;
        $this->assertInstanceOf($expected, $case);
    }

}