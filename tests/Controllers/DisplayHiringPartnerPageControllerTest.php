<?php

use PHPUnit\Framework\TestCase;
use Portal\Controllers\DisplayHiringPartnerPageController;
use Portal\Models\HiringPartnerModel;

class DisplayHiringPartnerPageControllerTest extends TestCase
{

    public function testConstruct()
    {
        $mockRender = $this->createMock(PhpRenderer::class);
        $mockModel = $this->createMock(HiringPartnerModel::class);
        $case = new DisplayHiringPartnerPageController($mockRender, $mockModel);
        $expected = DisplayHiringPartnerPageController::class;
        $this->assertInstanceOf($expected, $case);
    }
}