<?php

namespace Tests\Controllers\API\API\API\API\API\API\API\API\API\API\API\API\API\API\API\API\API\API\API\FrontEnd;

use Portal\Controllers\FrontEnd\DisplayStagesController;
use PHPUnit\Framework\TestCase;
use Portal\Models\StageModel;
use Slim\Views\PhpRenderer;

class DisplayStagesControllerTest extends TestCase
{
    /**
     * Checks whether the DisplayStagesController instantiates an object in the
     * DisplayStagesController Class, passing in a
     * mock PhpRenderer and mock StageModel
     */
    public function testConstruct()
    {
        $mockRender = $this->createMock(PhpRenderer::class);
        $mockModel = $this->createMock(StageModel::class);
        $case = new DisplayStagesController($mockRender, $mockModel);
        $expected = DisplayStagesController::class;
        $this->assertInstanceOf($expected, $case);
    }
}
