<?php

use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;
use Portal\Factories\HiringPartnerContactsModelFactory;
use Portal\Models\HiringPartnerContactsModel;

class HiringPartnerContactsModelFactoryTest extends TestCase
{
    function testInvoke()
    {
        $container = $this->createMock(ContainerInterface::class);
        $db = $this->createMock(\PDO::class);
        $container->method('get')
            ->willReturn($db);
        $factory = new HiringPartnerContactsModelFactory();
        $case = $factory($container);
        $expected = HiringPartnerContactsModel::class;
        $this->assertInstanceOf($expected, $case);
    }
}
