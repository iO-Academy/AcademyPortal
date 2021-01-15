<?php

namespace Tests\Factories\Controllers\FrontEnd;

use PHPUnit\Framework\TestCase;
use Portal\Controllers\FrontEnd\StagesPageController;
use Portal\Models\StageModel;
use Slim\Views\PhpRenderer;

class StagesPageControllerFactoryTest extends TestCase
{
    /**
     * Checks if StagesPageControllerFactory instantiates an object of the class
     * DisplayChangesController, passing in
     * a mock PhpRenderer and mock StageModel
     */
    public function testDisplayStagesControllerFactory()
    {
        $renderer = $this->createMock(PhpRenderer::class);
        $model = $this->createMock(StageModel::class);
        $case = new StagesPageController($renderer, $model);
        $expected = StagesPageController::class;
        $this->assertInstanceOf($expected, $case);
    }
}
