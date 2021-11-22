<?php

namespace Tests\Factories\Controllers\FrontEnd;

use Portal\Controllers\FrontEnd\StudentApplicationFormPageController;
use Portal\Factories\Controllers\FrontEnd\StudentApplicationFormPageControllerFactory;
use Psr\Container\ContainerInterface;
use Slim\Views\PhpRenderer;

class StudentApplicationFormPageFactoryTest
{
    public function testInvoke()
    {
        $container = $this->createMock(ContainerInterface::class);
        $renderer = $this->createMock(PhpRenderer::class);
        $container->method('get')
            ->willReturn($renderer);

        $factory = new StudentApplicationFormPageControllerFactory();
        $case = $factory($container);
        $expected = StudentApplicationFormPageController::class;
        $this->assertInstanceOf($expected, $case);
    }
}