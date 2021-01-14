<?php

namespace Tests\Controllers\FrontEnd;

use Portal\Controllers\FrontEnd\StagesPageController;
use PHPUnit\Framework\TestCase;
use Portal\Models\StageModel;
use Slim\Views\PhpRenderer;

class StagesPageControllerTest extends TestCase
{
    /**
     * Checks whether the StagesPageController instantiates an object in the
     * StagesPageController Class, passing in a
     * mock PhpRenderer and mock StageModel
     */
    public function testConstruct()
    {
        $mockRender = $this->createMock(PhpRenderer::class);
        $mockModel = $this->createMock(StageModel::class);
        $case = new StagesPageController($mockRender, $mockModel);
        $expected = StagesPageController::class;
        $this->assertInstanceOf($expected, $case);
    }
}
