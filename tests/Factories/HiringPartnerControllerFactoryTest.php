<?php

use PHPUnit\Framework\TestCase;
use Portal\Factories\HiringPartnerControllerFactory;
use Portal\Controllers\HiringPartnerController;
use Slim\Views\PhpRenderer;
use Psr\Container\ContainerInterface;

class HiringPartnerControllerFactoryTest extends TestCase
{
    public function testInvoke()
    {
        $container = $this->createMock(ContainerInterface::class);
        $renderer = $this->createMock(PhpRenderer::class);
        $container->method('get')
            ->willReturn($renderer);

        $factory = new HiringPartnerControllerFactory();
        $case = $factory($container);
        $expected = HiringPartnerController::class;
        $this->assertInstanceOf($expected, $case);
    }
}