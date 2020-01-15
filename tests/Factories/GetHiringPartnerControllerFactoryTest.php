<?php

namespace Test\Factories;

use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;
use Portal\Models\HiringPartnerModel;
use Portal\Factories\GetHiringPartnerControllerFactory;
use Portal\Controllers\GetHiringPartnersController;

class GetHiringPartnerControllerFactoryTest extends TestCase
{
    public function testReturnsNewInstanceOfController()
    {
        $container = $this->createMock(ContainerInterface::class);
        $hiringPartnerModel = $this->createMock(HiringPartnerModel::class);
        $container->method('get')->willReturn($hiringPartnerModel);
        $factory = new GetHiringPartnerControllerFactory();
        $case = $factory($container);
        $expected = GetHiringPartnersController::class;
        $this->assertInstanceOf($expected, $case);
    }
}
