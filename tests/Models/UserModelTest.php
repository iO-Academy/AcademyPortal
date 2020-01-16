<?php

namespace Tests\Models;

use Tests\TestCase;
use Portal\Models\UserModel;

class UserModelTest extends TestCase
{
    public function testConstruct()
    {
        $db = $this->createMock(\PDO::class);
            $case = new UserModel($db);
            $expected = UserModel::class;

            $this->assertInstanceOf($expected, $case);
    }
    public function testSuccessUserLoginVerify()
    {
        $userEmail = 'test@test.com';
        $password = 'test';
        $userCredentials = [
            'email' =>  'test@test.com',
            'password' =>  password_hash('test', PASSWORD_DEFAULT, ['cost' => 12]),
        ];

        $db = $this->createMock(\PDO::class);
        $user = new UserModel($db);
        $case = $user->userLoginVerify($userEmail, $password, $userCredentials);
        $expected = true;
        $this->assertEquals($expected, $case);
    }
}
