<?php

use PHPUnit\Framework\TestCase;
use Portal\Factories\HiringPartnerModelFactory;
use Psr\Container\ContainerInterface;

use Portal\Models\HiringPartnerModel;

class HiringPartnerModelFactoryTest extends TestCase
{
    function testInvoke()
    {
        $db = $this->createMock(\PDO::class);
        $container = $this->createMock(ContainerInterface::class);
        $container->dbConnection = $db;

        $factory = new HiringPartnerModelFactory();
        $case = $factory($container);
        $expected = HiringPartnerModel::class;
        $this->assertInstanceOf($expected, $case);
    }
}