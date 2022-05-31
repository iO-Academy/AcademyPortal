<?php

namespace Tests\Factories\Models;

use Portal\Factories\Models\EventCategoriesModelFactory;
use PHPUnit\Framework\TestCase;
use Portal\Models\EventCategoriesModel;
use Psr\Container\ContainerInterface;

class EventCategoriesModelFactoryTest extends TestCase
{

    public function testInvoke()
    {
        $db = $this->createMock(\PDO::class);
        $container = $this->createMock(ContainerInterface::class);
        $container->method('get')
            ->willReturn($db);

        $factory = new EventCategoriesModelFactory();
        $case = $factory($container);
        $expected = EventCategoriesModel::class;
        $this->assertInstanceOf($expected, $case);
    }
}
