<?php

namespace Tests\Factories\Controllers\FrontEnd;

use Tests\TestCase;
use Slim\Views\PhpRenderer;
use Psr\Container\ContainerInterface;
use Portal\Controllers\FrontEnd\RegisterPageController;
use Portal\Factories\Controllers\FrontEnd\RegisterPageControllerFactory;

class RegisterControllerFactoryTest extends TestCase
{
    public function testInvoke()
    {
        $container = $this->createMock(ContainerInterface::class);
        $renderer = $this->createMock(PhpRenderer::class);

        //best solution is to use prophecy but this works. Do not mess with order in factory
        $container->method('get')
            ->withConsecutive(
                [$this->equalTo('renderer')],
                [$this->equalTo('RandomPasswordModel')]
            )
            ->willReturnOnConsecutiveCalls($renderer, 'password');

        $factory =  new RegisterPageControllerFactory();
        $case = $factory($container);
        $expected = RegisterPageController::class;
        $this->assertInstanceOf($expected, $case);
    }
}
