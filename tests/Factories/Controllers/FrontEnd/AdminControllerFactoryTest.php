<?php

namespace Tests\Factories\Controllers\FrontEnd;

use Tests\TestCase;
use Portal\Factories\Controllers\FrontEnd\AdminPageControllerFactory;
use Slim\Views\PhpRenderer;
use Psr\Container\ContainerInterface;
use Portal\Controllers\FrontEnd\AdminPageController;

class AdminControllerFactoryTest extends TestCase
{
    public function testInvoke()
    {
        $container = $this->createMock(ContainerInterface::class);
        $renderer = $this->createMock(PhpRenderer::class);
        $container->method('get')
            ->willReturn($renderer);

        $factory = new AdminPageControllerFactory();
        $case = $factory($container);
        $expected = AdminPageController::class;
        $this->assertInstanceOf($expected, $case);
    }
}
