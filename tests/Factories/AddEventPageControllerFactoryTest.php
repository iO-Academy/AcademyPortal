<?php

use PHPUnit\Framework\TestCase;
use Portal\Factories\AddEventPageControllerFactory;
use Portal\Controllers\AddEventPageController;
use Slim\Views\PhpRenderer;
use Portal\Models\EventModel;
use Psr\Container\ContainerInterface;

class AddEventPageControllerFactoryTest extends TestCase
{
    public function testInvoke()
    {
        $container = $this->createMock(ContainerInterface::class);
        $renderer = $this->createMock(PhpRenderer::class);
        $eventModel = $this->createMock(EventModel::class);
        $container->renderer = $renderer;
        $container->EventModel = $eventModel;
        $factory = new AddEventPageControllerFactory();
        $case = $factory($container);
        $expected = AddEventPageController::class;
        $this->assertInstanceOf($expected, $case);
    }
}