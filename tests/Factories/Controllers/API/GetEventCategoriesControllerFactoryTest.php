<?php

namespace Tests\Factories\Controllers\API;

use Portal\Controllers\API\GetEventCategoriesController;
use Portal\Factories\Controllers\API\GetEventCategoriesControllerFactory;
use PHPUnit\Framework\TestCase;
use Portal\Models\EventCategoriesModel;
use Psr\Container\ContainerInterface;

class GetEventCategoriesControllerFactoryTest extends TestCase
{

    public function testInvoke()
    {
        $container = $this->createMock(ContainerInterface::class);
        $eventCategoriesModel = $this->createMock(EventCategoriesModel::class);
        $container->method('get')
            ->willReturn($eventCategoriesModel);

        $factory = new GetEventCategoriesControllerFactory();
        $case = $factory($container);
        $expected = GetEventCategoriesController::class;
        $this->assertInstanceOf($expected, $case);
    }
}
