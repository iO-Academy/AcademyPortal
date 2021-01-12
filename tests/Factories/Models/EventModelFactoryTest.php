<?php

namespace Tests\Factories\Models;

use Tests\TestCase;
use Psr\Container\ContainerInterface;
use Portal\Factories\Models\EventModelFactory;
use Portal\Models\EventModel;

class EventModelFactoryTest extends TestCase
{
    public function testInvoke()
    {
        $container = $this->createMock(ContainerInterface::class);
        $db = $this->createMock(\PDO::class);
        $container->method('get')
                  ->willReturn($db);
        $factory = new EventModelFactory();
        $case = $factory($container);
        $expected = EventModel::class;
        $this->assertInstanceOf($expected, $case);
    }
}
