<?php

namespace Tests\Controllers;

use Portal\Controllers\DisplayStagesController;
use PHPUnit\Framework\TestCase;
use Portal\Models\StageModel;
use Slim\Views\PhpRenderer;

/**
 * Checks whether the DisplayStagesController instantiates an object in the DisplayStagesController Class, passing in a
 * mock PhpRenderer and mock StageModel
 */
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
