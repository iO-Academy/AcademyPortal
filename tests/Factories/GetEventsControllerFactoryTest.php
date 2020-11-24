<?php

namespace Tests\Factories;

use Tests\TestCase;
use Portal\Controllers\API\GetEventsController;
use Portal\Factories\GetEventsControllerFactory;
use Portal\Models\EventModel;
use Psr\Container\ContainerInterface;

class GetEventsControllerFactoryTest extends TestCase
{
    public function testController()
    {
        $container = $this->createMock(ContainerInterface::class);
        $eventModel = $this->createMock(EventModel::class);
        $container->method('get')->willReturn($eventModel);
        $factory = new GetEventsControllerFactory();

        $case = $factory($container);
        $expected = GetEventsController::class;
        $this->assertInstanceOf($expected, $case);
    }
}
