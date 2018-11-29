<?php

use PHPUnit\Framework\TestCase;
use Portal\Factories\EventModelFactory;
use Psr\Container\ContainerInterface;
use Portal\Models\EventModel;

class EventModelFactoryTest extends TestCase
{
    function testInvoke()
    {
        $db = $this->createMock(\PDO::class);
        $container = $this->createMock(ContainerInterface::class);
        $container->dbConnection = $db;
        $factory = new EventModelFactory();
        $case = $factory($container);
        $expected = EventModel::class;
        $this->assertInstanceOf($expected, $case);
    }
}