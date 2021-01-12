<?php

namespace Tests\Factories\Models;

use Tests\TestCase;
use Psr\Container\ContainerInterface;
use Portal\Factories\Models\HiringPartnerModelFactory;
use Portal\Models\HiringPartnerModel;

class HiringPartnerModelFactoryTest extends TestCase
{
    public function testInvoke()
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
