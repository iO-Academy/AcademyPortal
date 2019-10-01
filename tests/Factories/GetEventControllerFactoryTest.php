<?php

namespace Tests\Factories;

use PHPUnit\Framework\TestCase;
use Portal\Controllers\GetEventController;
use Portal\Factories\GetEventControllerFactory;
use Portal\Models\EventModel;
use Psr\Container\ContainerInterface;

class GetEventControllerFactoryTest extends TestCase
{
    public function testController()
    {
        $container = $this->createMock(ContainerInterface::class);
        $eventModel = $this->createMock(EventModel::class);
        $container->method('get')->willReturn($eventModel);
        $factory = new GetEventControllerFactory();

        $case = $factory($container);
        $expected = GetEventController::class;
        $this->assertInstanceOf($expected, $case);
    }
}
