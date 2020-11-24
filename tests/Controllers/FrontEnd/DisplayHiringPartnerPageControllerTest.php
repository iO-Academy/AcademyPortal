<?php

namespace Tests\Controllers\API\API\API\API\API\API\API\API\API\API\API\API\API\API\API\API\API\API\API\FrontEnd;

use Tests\TestCase;
use Portal\Controllers\FrontEnd\DisplayHiringPartnerPageController;
use Portal\Models\HiringPartnerModel;
use Slim\Views\PhpRenderer;

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
