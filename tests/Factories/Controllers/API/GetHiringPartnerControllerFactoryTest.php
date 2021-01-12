<?php

namespace Test\Factories\Controllers\API;

use Tests\TestCase;
use Psr\Container\ContainerInterface;
use Portal\Models\HiringPartnerModel;
use Portal\Factories\Controllers\API\GetHiringPartnerControllerFactory;
use Portal\Controllers\API\GetHiringPartnersController;

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
