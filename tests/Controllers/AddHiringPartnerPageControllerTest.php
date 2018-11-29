<?php

use PHPUnit\Framework\TestCase;
use Portal\Controllers\AddHiringPartnerPageController;
use Portal\Models\HiringPartnerModel;
use Slim\Views\PhpRenderer;

class AddHiringPartnerPageControllerTest extends TestCase
{
    public function testConstruct()
    {
        $mockRenderer = $this->createMock(PhpRenderer::class);
        $mockModel = $this->createMock(HiringPartnerModel::class);

        $case = new AddHiringPartnerPageController($mockRenderer, $mockModel);
        $expected = AddHiringPartnerPageController::class;
        $this->assertInstanceOf($expected, $case);
    }
}