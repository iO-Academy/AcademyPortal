<?php

use PHPUnit\Framework\TestCase;
use Portal\Factories\UserModelFactory;
use Portal\Models\UserModel;
use Psr\Container\ContainerInterface;

class UserModelFactoryTest extends TestCase
{
    function testInvoke()
    {
        $db = new PDO('mysql:host=192.168.20.20;dbname=academyPortal', 'root');
        $container = $this->createMock(ContainerInterface::class);
        $container->method('get')
            ->willReturn($db);

        $factory = new UserModelFactory;
        $case = $factory($container);
        $expected = UserModel::class;
        $this->assertInstanceOf($expected, $case);
    }
}