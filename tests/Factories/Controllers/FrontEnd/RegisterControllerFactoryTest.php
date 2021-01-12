<?php

namespace Tests\Factories\Controllers\FrontEnd;

use Tests\TestCase;
use Slim\Views\PhpRenderer;
use Psr\Container\ContainerInterface;
use Portal\Controllers\FrontEnd\RegisterController;
use Portal\Factories\Controllers\FrontEnd\RegisterControllerFactory;

class RegisterControllerFactoryTest extends TestCase
{
    public function testInvoke()
    {
        $container = $this->createMock(ContainerInterface::class);
        $renderer = $this->createMock(PhpRenderer::class);

        //best solution is to use prophecy but this works. Do not mess with order in factory
        $container->expects($this->at(0))->method('get')
            ->with($this->equalTo('renderer'))
            ->willReturn($renderer);

        $container->expects($this->at(1))->method('get')
            ->with($this->equalTo('RandomPasswordModel'))
            ->willReturn('password');

        $factory =  new RegisterControllerFactory;
        $case = $factory($container);
        $expected = RegisterController::class;
        $this->assertInstanceOf($expected, $case);
    }
}
