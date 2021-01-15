<?php

namespace Tests\Controllers\FrontEnd;

use Tests\TestCase;
use Portal\Controllers\FrontEnd\HiringPartnerPageController;
use Portal\Models\HiringPartnerModel;
use Slim\Views\PhpRenderer;

class HiringPartnerPageControllerTest extends TestCase
{

    public function testConstruct()
    {
        $mockRender = $this->createMock(PhpRenderer::class);
        $mockModel = $this->createMock(HiringPartnerModel::class);
        $case = new HiringPartnerPageController($mockRender, $mockModel);
        $expected = HiringPartnerPageController::class;
        $this->assertInstanceOf($expected, $case);
    }
}
