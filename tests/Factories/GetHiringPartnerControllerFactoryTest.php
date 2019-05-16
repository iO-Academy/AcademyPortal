<?php


use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;
use Portal\Models\HiringPartnerModel;
use Portal\Factories\GetHiringPartnerControllerFactory;
use Portal\Controllers\GetHiringPartnerController;

class GetHiringPartnerControllerFactoryTest extends TestCase
{
    function testReturnsNewInstanceOfController()
    {
        $container = $this->createMock(ContainerInterface::class);
        $hiringPartnerModel = $this->createMock(HiringPartnerModel::class);
        $container->method('get')->willReturn($hiringPartnerModel);
        $factory = new GetHiringPartnerControllerFactory();
        $case = $factory($container);
        $expected = GetHiringPartnerController::class;
        $this->assertInstanceOf($expected, $case);
    }
}


