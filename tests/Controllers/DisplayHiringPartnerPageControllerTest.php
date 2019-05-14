<?php

use PHPUnit\Framework\TestCase;
use Portal\Controllers\DisplayHiringPartnerPageController;
use Portal\Models\HiringPartnerModel;

class DisplayHiringPartnerPageControllerTest extends TestCase {

    function testConstruct()
    {
        $stub = $this->createMock(PhpRenderer::class);

        $case = new DisplayHiringPartnerPageController($stub);
        $expected = DisplayHiringPartnerPageController::class;
        $this->assertInstanceOf($expected, $case);
    }
}