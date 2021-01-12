<?php

namespace Tests\Factories\Controllers\FrontEnd;

use Tests\TestCase;

class DisplayHiringPartnerPageControllerFactoryTest extends TestCase
{

    public function testDisplayHiringPartnerPageControllerFactory()
    {
        $renderer = $this->createMock(\Slim\Views\PhpRenderer::class);
        $model = $this->createMock(\Portal\Models\HiringPartnerModel::class);
        $case = new \Portal\Controllers\FrontEnd\DisplayHiringPartnerPageController($renderer, $model);
        $expected = \Portal\Controllers\FrontEnd\DisplayHiringPartnerPageController::class;
        $this->assertInstanceOf($expected, $case);
    }
}
