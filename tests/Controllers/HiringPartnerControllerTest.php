<?php

use PHPUnit\Framework\TestCase;
use Slim\Views\PhpRenderer;
use Portal\Models\HiringPartnerModel;
use Portal\Controllers\HiringPartnerController;

class HiringPartnerControllerTest extends TestCase {

    function testConstruct()
    {
        $renderer = $this->createMock(PhpRenderer::class);
        $hiringPartnerModel = $this->createMock(HiringPartnerModel::class);
        $case = new HiringPartnerController($renderer, $hiringPartnerModel);
        $expected = HiringPartnerController::class;
        $this->assertInstanceOf($expected, $case);
    }
}