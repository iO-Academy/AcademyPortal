<?php

use PHPUnit\Framework\TestCase;
use Portal\Factories\GetCompanySizeControllerFactory;
use Portal\Controllers\GetCompanySizeController;
use Portal\Models\HiringPartnerModel;
use Psr\Container\ContainerInterface;

class GetCompanySizeControllerFactoryTest extends TestCase
{
    function testInvoke()
    {
        $container = $this->createMock(ContainerInterface::class);
        $model = $this->createMock(HiringPartnerModel::class);
        $container->method('get')
            ->willReturn($model);
        $factory = new GetCompanySizeControllerFactory();
        $case = $factory($container);
        $expected = GetCompanySizeController::class;
        $this->assertInstanceOf($expected, $case);
    }
}