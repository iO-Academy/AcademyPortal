<?php

namespace Tests\Controllers;

use Tests\TestCase;
use Portal\Controllers\RegisterUserController;
use Portal\Models\UserModel;

class RegisterUserControllerTest extends TestCase
{
    private $mockUserModel;

    public function setup()
    {
        $this->mockUserModel = $this->createMock(UserModel::class);
    }

    public function testConstruct()
    {
        $case = new RegisterUserController($this->mockUserModel);
        $expected = RegisterUserController::class;
        $this->assertInstanceOf($expected, $case);
    }
}
