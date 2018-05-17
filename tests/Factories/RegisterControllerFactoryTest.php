<?php


namespace Tests\Factories;

use PHPUnit\Framework\TestCase;
use Slim\Views\PhpRenderer;
use Psr\Container\ContainerInterface;
use Portal\Controllers\RegisterController;
use Portal\Factories\RegisterControllerFactory;
use Portal\Models\RandomPasswordModel;

class RegisterControllerFactoryTest extends TestCase
{
    function testInvoke()
    {
        $container = $this->createMock(ContainerInterface::class);
        $renderer = $this->createMock(PhpRenderer::class);
        $RandomPasswordModel = $this->createMock(RandomPasswordModel::class);

        $container->expects($this->at(0))->method('get')//best solution is to use prophecy but this works. Do not mess with order in factory
            ->with($this->equalTo('renderer'))
            ->willReturn($renderer);

        $container->expects($this->at(1))->method('get')
            ->with($this->equalTo('RandomPasswordModel'))
            ->willReturn($RandomPasswordModel);

        $factory =  new RegisterControllerFactory;
        $case = $factory($container);
        $expected = RegisterController::class;
        $this->assertInstanceOf($expected, $case);
    }
}