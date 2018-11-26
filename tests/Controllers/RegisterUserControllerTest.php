<?php
/**
 * Created by PhpStorm.
 * User: academy
 * Date: 26/11/2018
 * Time: 15:40
 */

namespace Tests\Controllers;

use PHPUnit\Framework\TestCase;
use Portal\Controllers\RegisterUserController;
use Portal\Models\UserModel;
use Slim\Http\Request;
use Slim\Http\Response;

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