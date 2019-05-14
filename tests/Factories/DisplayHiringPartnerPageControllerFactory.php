<?php

use PHPUnit\Framework\TestCase;
use Portal\Controllers\DisplayHiringPartnerPageController;
use Portal\Models\HiringPartnerModel;

class DisplayHiringPartnerPageControllerFactoryTest extends TestCase {

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