<?php

use PHPUnit\Framework\TestCase;
use Slim\Views\PhpRenderer;
use Portal\Models\EventModel;
use Portal\Controllers\AddEventPageController;

class AddEventPageControllerTest extends TestCase
{
    public function testConstruct()
    {
        $mockRenderer = $this->createMock(PhpRenderer::class);
        $mockModel = $this->createMock(EventModel::class);

        $case = new AddEventPageController($mockRenderer, $mockModel);
        $expected = AddEventPageController::class;
        $this->assertInstanceOf($expected, $case);
    }
}