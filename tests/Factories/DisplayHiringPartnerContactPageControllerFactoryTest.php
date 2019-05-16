<?php

use PHPUnit\Framework\TestCase;

class DisplayHiringPartnerContactPageControllerFactoryTest extends TestCase {

    function testDisplayHiringPartnerPageControllerFactory()
    {
        $renderer = $this->createMock(\Slim\Views\PhpRenderer::class);
        $model = $this->createMock(\Portal\Models\HiringPartnerModel::class);
        $case = new \Portal\Controllers\DisplayHiringPartnerContactPageController($renderer, $model);
        $expected = \Portal\Controllers\DisplayHiringPartnerContactPageController::class;
        $this->assertInstanceOf($expected, $case);
    }
}