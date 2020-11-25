<?php

namespace Test\Factories;

use PHPUnit\Framework\TestCase;
use Portal\Controllers\FrontEnd\DisplayStagesController;
use Portal\Models\StageModel;
use Slim\Views\PhpRenderer;

class DisplayStagesControllerFactoryTest extends TestCase
{
    /**
     * Checks if DisplayStagesControllerFactory instantiates an object of the class
     * DisplayChangesController, passing in
     * a mock PhpRenderer and mock StageModel
     */
    public function testDisplayStagesControllerFactory()
    {
        $renderer = $this->createMock(PhpRenderer::class);
        $model = $this->createMock(StageModel::class);
        $case = new DisplayStagesController($renderer, $model);
        $expected = DisplayStagesController::class;
        $this->assertInstanceOf($expected, $case);
    }
}
