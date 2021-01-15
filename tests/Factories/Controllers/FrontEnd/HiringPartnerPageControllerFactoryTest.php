<?php

namespace Tests\Factories\Controllers\FrontEnd;

use Tests\TestCase;

class HiringPartnerPageControllerFactoryTest extends TestCase
{

    public function testDisplayHiringPartnerPageControllerFactory()
    {
        $renderer = $this->createMock(\Slim\Views\PhpRenderer::class);
        $model = $this->createMock(\Portal\Models\HiringPartnerModel::class);
        $case = new \Portal\Controllers\FrontEnd\HiringPartnerPageController($renderer, $model);
        $expected = \Portal\Controllers\FrontEnd\HiringPartnerPageController::class;
        $this->assertInstanceOf($expected, $case);
    }
}
