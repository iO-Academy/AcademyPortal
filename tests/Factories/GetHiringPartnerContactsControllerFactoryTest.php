<?php

use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;
use Portal\Models\HiringPartnerContactsModel;
use Portal\Factories\GetHiringPartnerContactsControllerFactory;
use Portal\Controllers\GetHiringPartnerContactsController;

class GetHiringPartnerContactsControllerFactoryTest extends TestCase
{
    function testReturnsNewInstanceOfController()
    {
        $container = $this->createMock(ContainerInterface::class);
        $hiringPartnerContactsModel = $this->createMock(HiringPartnerContactsModel::class);
        $container->method('get')->willReturn($hiringPartnerContactsModel);
        $factory = new GetHiringPartnerContactsControllerFactory();
        $case = $factory($container);
        $expected = GetHiringPartnerContactsController::class;
        $this->assertInstanceOf($expected, $case);
    }
}
