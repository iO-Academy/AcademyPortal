<?php

namespace Tests\Factories;

use PHPUnit\Framework\TestCase;
use Portal\Controllers\AddHiringPartnerController;
use Portal\Factories\AddHiringPartnerControllerFactory;
use Portal\Models\HiringPartnerModel;
use Psr\Container\ContainerInterface;

class AddHiringPartnerControllerFactoryTest extends TestCase
{
    public function testInvokeSuccess()
    {
        $container = $this->createMock(ContainerInterface::class);
        $mockHiringPartnerModel = $this->createMock(HiringPartnerModel::class);
        $container->method('get')->willReturn($mockHiringPartnerModel);

        $case = new AddHiringPartnerControllerFactory();
        $result = $case($container);
        $this->assertInstanceOf(AddHiringPartnerController::class, $result);
    }
}