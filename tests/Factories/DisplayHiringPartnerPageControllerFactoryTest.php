git<?php

use PHPUnit\Framework\TestCase;

class DisplayHiringPartnerPageControllerFactoryTest extends TestCase {

    function testDisplayHiringPartnerPageControllerFactory()
    {
        $renderer = $this->createMock(\Slim\Views\PhpRenderer::class);
        $model = $this->createMock(\Portal\Models\HiringPartnerModel::class);
        $case = new \Portal\Controllers\DisplayHiringPartnerPageController($renderer, $model);
        $expected = \Portal\Controllers\DisplayHiringPartnerPageController::class;
        $this->assertInstanceOf($expected, $case);
    }
}