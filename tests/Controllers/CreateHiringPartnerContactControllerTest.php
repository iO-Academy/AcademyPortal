<?php

use PHPUnit\Framework\TestCase;
use Slim\Views\PhpRenderer;
use Portal\Models\HiringPartnerModel;
use Portal\Controllers\CreateHiringPartnerContactController;

class CreateHiringPartnerContactControllerTest extends TestCase {

    function testConstruct()
    {
        $hiringPartnerModel = $this->createMock(HiringPartnerModel::class);
        $case = new CreateHiringPartnerContactController($hiringPartnerModel);
        $expected = CreateHiringPartnerContactController::class;
        $this->assertInstanceOf($expected, $case);
    }
}