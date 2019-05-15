<?php

use PHPUnit\Framework\TestCase;
use Slim\Views\PhpRenderer;
use Portal\Models\HiringPartnerModel;
use Portal\Controllers\CreateHiringPartnerController;

class CreateHiringPartnerControllerTest extends TestCase {

    function testConstruct()
    {
        $renderer = $this->createMock(PhpRenderer::class);
        $hiringPartnerModel = $this->createMock(HiringPartnerModel::class);
        $case = new CreateHiringPartnerController($renderer, $hiringPartnerModel);
        $expected = CreateHiringPartnerController::class;
        $this->assertInstanceOf($expected, $case);
    }
}