<?php

use PHPUnit\Framework\TestCase;
use Portal\Models\UserModel;

class UserModelTest extends TestCase
{
    function testConstruct()
    {
            $db = new PDO('mysql:host=192.168.20.20;dbname=academyPortal', 'root');
            $case = new UserModel($db);
            $expected = UserModel::class;

            $this->assertInstanceOf($expected, $case);
    }
    function testSuccessUserLoginVerify() {
        $userEmail = 'test@test.com';
        $password = 'test';
        $userCredentials = [
            'email' =>  'test@test.com',
            'password' =>  password_hash('test', PASSWORD_DEFAULT, ['cost' => 12]),
        ];

        $db = new PDO('mysql:host=192.168.20.20;dbname=academyPortal', 'root');
        $user = new UserModel($db);
        $case = $user->userLoginVerify($userEmail, $password, $userCredentials);
        $expected = true;
        $this->assertEquals($expected, $case);
    }
}