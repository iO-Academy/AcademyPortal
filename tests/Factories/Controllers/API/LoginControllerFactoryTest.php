<?php

namespace Tests\Factories\Controllers\API;

use Tests\TestCase;
use Portal\Factories\Controllers\API\LoginControllerFactory;
use Portal\Controllers\API\LoginController;
use Portal\Models\UserModel;
use Psr\Container\ContainerInterface;

class LoginControllerFactoryTest extends TestCase
{
    public function testInvoke()
    {
        $container = $this->createMock(ContainerInterface::class);
        $user = $this->createMock(UserModel::class);
        $container->method('get')
                         ->willReturn($user);

        $factory = new LoginControllerFactory();
        $case = $factory($container);
        $expected = LoginController::class;
        $this->assertInstanceOf($expected, $case);
    }
}
