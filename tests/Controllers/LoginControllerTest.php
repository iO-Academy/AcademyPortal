<?php

namespace Tests\Controllers;

use Tests\TestCase;
use Portal\Controllers\API\LoginController;
use Portal\Models\UserModel;

class LoginControllerTest extends TestCase
{
    public function testConstruct()
    {
        $userModel = $this->createMock(UserModel::class);

        $case = new LoginController($userModel);
        $expected = LoginController::class;
        $this->assertInstanceOf($expected, $case);
    }
}
