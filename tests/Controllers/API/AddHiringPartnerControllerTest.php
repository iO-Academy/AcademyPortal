<?php

namespace Tests\Controllers\API;

use Tests\TestCase;
use Slim\Views\PhpRenderer;
use Portal\Models\HiringPartnerModel;
use Portal\Controllers\API\AddHiringPartnerController;

class AddHiringPartnerControllerTest extends TestCase
{

    public function testConstruct()
    {
        $hiringPartnerModel = $this->createMock(HiringPartnerModel::class);
        $case = new AddHiringPartnerController($hiringPartnerModel);
        $expected = AddHiringPartnerController::class;
        $this->assertInstanceOf($expected, $case);
    }
}
