<?php

namespace Test\Factories;

use PHPUnit\Framework\TestCase;
use Portal\Controllers\DisplayStagesController;
use Portal\Models\StageModel;
use Slim\Views\PhpRenderer;

class DisplayStagesControllerFactoryTest extends TestCase
{
    public function testDisplayStagesControllerFactory()
    {
        $renderer = $this->createMock(PhpRenderer::class);
        $model = $this->createMock(StageModel::class);
        $case = new DisplayStagesController($renderer, $model);
        $expected = DisplayStagesController::class;
        $this->assertInstanceOf($expected, $case);
    }
}
