<?php

use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;
use Portal\Factories\CreateHiringPartnerContactControllerFactory;
use Portal\Controllers\CreateHiringPartnerContactController;
use Portal\Models\HiringPartnerContactsModel;

class CreateHiringPartnerContactControllerFactoryTest extends TestCase
{
    public function testInvoke()
    {
        $container = $this->createMock(ContainerInterface::class);
        $hiringPartnerContactModel = $this->createMock(HiringPartnerContactsModel::class);
        $container->method('get')
            ->willReturn($hiringPartnerContactModel);
        $factory = new CreateHiringPartnerContactControllerFactory();
        $case = $factory($container);
        $expected = CreateHiringPartnerContactController::class;
        $this->assertInstanceOf($expected, $case);
    }
}