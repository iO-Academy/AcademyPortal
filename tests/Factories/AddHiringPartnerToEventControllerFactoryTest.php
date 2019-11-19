<?php

namespace Tests\Factories;

use PHPUnit\Framework\TestCase;
use Portal\Factories\AddHiringPartnerToEventControllerFactory;
use Slim\Views\PhpRenderer;
use Psr\Container\ContainerInterface;
use Portal\Controllers\AddHiringPartnerToEventController;

class AddHiringPartnerToEventControllerFactoryTest extends TestCase
{
    public function testInvoke()
    {
        $container = $this->createMock(ContainerInterface::class);
        $renderer = $this->createMock(PhpRenderer::class);
        $container->method('get')
            ->willReturn($renderer);

        $factory = new AddHiringPartnerToEventControllerFactory;
        $case = $factory($container);
        $expected = AddHiringPartnerToEventController::class;
        $this->assertInstanceOf($expected, $case);
    }
}

