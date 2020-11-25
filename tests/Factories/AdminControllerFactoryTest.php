<?php

namespace Tests\Factories;

use Tests\TestCase;
use Portal\Factories\AdminControllerFactory;
use Slim\Views\PhpRenderer;
use Psr\Container\ContainerInterface;
use Portal\Controllers\FrontEnd\AdminController;

class AdminControllerFactoryTest extends TestCase
{
    public function testInvoke()
    {
        $container = $this->createMock(ContainerInterface::class);
        $renderer = $this->createMock(PhpRenderer::class);
        $container->method('get')
            ->willReturn($renderer);

        $factory = new AdminControllerFactory;
        $case = $factory($container);
        $expected = AdminController::class;
        $this->assertInstanceOf($expected, $case);
    }
}
