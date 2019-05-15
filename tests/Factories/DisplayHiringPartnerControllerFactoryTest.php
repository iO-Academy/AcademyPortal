<?php

use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;
use Portal\Controllers\DisplayHiringPartnerPageController;

class DisplayHiringPartnerPageControllerFactoryTest extends TestCase {

    function testDisplayHiringPartnerPageControllerFactory()
    {
        $container = $this->createMock(ContainerInterface::class);
        $factory = new \Portal\Factories\DisplayHiringPartnerPageControllerFactory();
        $case = $factory($container);
        $expected = DisplayHiringPartnerPageController::class;
        $this->assertInstanceOf($expected, $case);
    }
}