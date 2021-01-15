<?php

namespace Tests\Controllers\API;

use Tests\TestCase;
use Portal\Controllers\API\AddUserController;
use Portal\Models\UserModel;

class AddUserControllerTest extends TestCase
{
    private $mockUserModel;

    public function setup()
    {
        $this->mockUserModel = $this->createMock(UserModel::class);
    }

    public function testConstruct()
    {
        $case = new AddUserController($this->mockUserModel);
        $expected = AddUserController::class;
        $this->assertInstanceOf($expected, $case);
    }
}
