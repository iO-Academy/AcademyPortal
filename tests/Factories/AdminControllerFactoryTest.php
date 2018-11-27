<?php

use PHPUnit\Framework\TestCase;
use Portal\Factories\AdminControllerFactory;
use Slim\Views\PhpRenderer;
use Psr\Container\ContainerInterface;
use Portal\Controllers\AdminController;

class AdminControllerFactoryTest extends TestCase
{
    function testInvoke()
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


