<?php

namespace Tests\Controllers;

use Portal\Controllers\DisplayStagesController;
use PHPUnit\Framework\TestCase;
use Portal\Models\StageModel;
use Slim\Views\PhpRenderer;

class DisplayStagesControllerTest extends TestCase
{
    public function testConstruct()
    {
        $mockRender = $this->createMock(PhpRenderer::class);
        $mockModel = $this->createMock(StageModel::class);
        $case = new DisplayStagesController($mockRender, $mockModel);
        $expected = DisplayStagesController::class;
        $this->assertInstanceOf($expected, $case);
    }
}
