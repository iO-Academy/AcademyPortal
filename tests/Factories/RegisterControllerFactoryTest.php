<?php


namespace Tests\Factories;

use PHPUnit\Framework\TestCase;
use Slim\Views\PhpRenderer;
use Psr\Container\ContainerInterface;
use Portal\Controllers\RegisterController;
use Portal\Factories\RegisterControllerFactory;

class RegisterControllerFactoryTest extends TestCase
{
    function testInvoke()
    {
        $container = $this->createMock(ContainerInterface::class);
        $renderer = $this->createMock(PhpRenderer::class);
        $container->method('get')
            ->willReturn($renderer);

        $factory = new RegisterControllerFactory;
        $case = $factory($container);
        $expected = RegisterController::class;
        $this->assertInstanceOf($expected, $case);
    }
}