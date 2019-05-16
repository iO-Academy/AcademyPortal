<?php

use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;
use Portal\Factories\CreateHiringPartnerContactControllerFactory;
use Portal\Controllers\CreateHiringPartnerContactController;

class CreateHiringPartnerContactControllerFactoryTest extends TestCase
{
    public function testInvoke()
    {
        $container = $this->createMock(ContainerInterface::class);
        $hiringPartnerContactModel = $this->createMock(\PDO::class);
        $container->method('get')
            ->willReturn($hiringPartnerContactModel);
        $factory = new CreateHiringPartnerContactControllerFactory();
        $case = $factory($container);
        $expected = CreateHiringPartnerContactController::class;
        $this->assertInstanceOf($expected, $case);
    }
}