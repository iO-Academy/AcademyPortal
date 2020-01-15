<?php

namespace Tests\Controllers;

use PHPUnit\Framework\TestCase;
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
