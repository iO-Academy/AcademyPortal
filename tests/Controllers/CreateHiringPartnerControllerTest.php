<?php

use PHPUnit\Framework\TestCase;
use Slim\Views\PhpRenderer;
use Portal\Models\HiringPartnerModel;
use Portal\Controllers\CreateHiringPartnerController;

class CreateHiringPartnerControllerTest extends TestCase {

    function testConstruct()
    {
        $hiringPartnerModel = $this->createMock(HiringPartnerModel::class);
        $case = new CreateHiringPartnerController($hiringPartnerModel);
        $expected = CreateHiringPartnerController::class;
        $this->assertInstanceOf($expected, $case);
    }
}