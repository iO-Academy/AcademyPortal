<?php

use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;
use Portal\Factories\HiringPartnerContactModelFactory;
use Portal\Controllers\HiringPartnerContactModel;

class HiringPartnerContactModelFactoryTest extends TestCase
{
    function testInvoke()
    {
        $container = $this->createMock(ContainerInterface::class);
        $db = $this->createMock(\PDO::class);
        $container->method('get')
            ->willReturn($db);
        $factory = new HiringPartnerContactModelFactory();
        $case = $factory($container);
        $expected = HiringPartnerContactModel::class;
        $this->assertInstanceOf($expected, $case);
    }
}
