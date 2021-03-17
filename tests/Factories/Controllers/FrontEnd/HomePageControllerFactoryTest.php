<?php

namespace Test\Factories\Controllers\FrontEnd;

use Tests\TestCase;
use Portal\Factories\Controllers\FrontEnd\HomePageControllerFactory;
use Slim\Views\PhpRenderer;
use Psr\Container\ContainerInterface;
use Portal\Controllers\FrontEnd\HomePageController;

class HomePageControllerFactoryTest extends TestCase
{
    public function testInvoke()
    {
        $container = $this->createMock(ContainerInterface::class);
        $renderer = $this->createMock(PhpRenderer::class);
        $container->method('get')
            ->willReturn($renderer);

        $factory = new HomePageControllerFactory();
        $case = $factory($container);
        $expected = HomePageController::class;
        $this->assertInstanceOf($expected, $case);
    }
}
