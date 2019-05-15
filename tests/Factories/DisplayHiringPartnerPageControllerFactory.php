<?php

use PHPUnit\Framework\TestCase;
use Portal\Controllers\DisplayHiringPartnerPageController;

class DisplayHiringPartnerPageControllerFactoryTest extends TestCase {

    function testDisplayHiringPartnerPageControllerFactory()
    {
        $container = $this->createMock(ContainerInterface::class);
        $factory = new \Portal\Factories\DisplayHiringPartnerPageControllerFactory($container);
        $case = $factory($container);
        $expected = DisplayHiringPartnerPageController\::class;
        $this->assertInstanceOf($expected, $case);
    }
}