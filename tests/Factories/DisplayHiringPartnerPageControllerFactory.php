<?php

use PHPUnit\Framework\TestCase;
use Portal\Controllers\DisplayHiringPartnerPageController;
use Portal\Models\HiringPartnerModel;

class DisplayHiringPartnerPageControllerFactoryTest extends TestCase {

    function testConstruct()
    {
        $stub = $this->createMock(PhpRenderer::class);
        $case = new DisplayHiringPartnerPageControllerFactory($stub);
        $expected = DisplayHiringPartnerPageControllerFactory::class;
        $this->assertInstanceOf($expected, $case);
    }
}