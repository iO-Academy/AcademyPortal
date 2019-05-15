<?php

use PHPUnit\Framework\TestCase;
use Portal\Factories\LoginControllerFactory;
use Portal\Controllers\LoginController;
use Portal\Models\UserModel;
use Psr\Container\ContainerInterface;

class LoginControllerFactoryTest extends TestCase
{
    function testInvoke()
    {
        $container = $this->createMock(ContainerInterface::class);
        $user = $this->createMock(UserModel::class);
        $container->method('get')
                         ->willReturn($user);

        $factory = new LoginControllerFactory;
        $case = $factory($container);
        $expected = LoginController::class;
        $this->assertInstanceOf($expected, $case);
    }

}
