<?php


use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;
use Portal\Factories\HiringPartnerModelFactory;
use Portal\Models\HiringPartnerModel;

class HiringPartnerModelFactoryTest extends TestCase
{
    function testInvoke()
    {
        $container = $this->createMock(ContainerInterface::class);
        $db = $this->createMock(\PDO::class);
        $container->method('get')
                  ->willReturn($db);
        $factory = new HiringPartnerModelFactory();
        $case = $factory($container);
        $expected = HiringPartnerModel::class;
        $this->assertInstanceOf($expected, $case);
    }
}

