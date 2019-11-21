<?php

namespace Tests\Factories;

use PHPUnit\Framework\TestCase;
use Portal\Factories\AddHiringPartnerToEventControllerFactory;
use Portal\Models\EventModel;
use Slim\Views\PhpRenderer;
use Psr\Container\ContainerInterface;
use Portal\Controllers\AddHiringPartnerToEventController;

class AddHiringPartnerToEventControllerFactoryTest extends TestCase
{
    public function testInvoke()
    {
        $container = $this->createMock(ContainerInterface::class);
        $eventModel = $this->createMock(EventModel::class);
        $container->method('get')
            ->willReturn($eventModel);

        $factory = new AddHiringPartnerToEventControllerFactory;
        $case = $factory($container);
        $expected = AddHiringPartnerToEventController::class;
        $this->assertInstanceOf($expected, $case);
    }
}
