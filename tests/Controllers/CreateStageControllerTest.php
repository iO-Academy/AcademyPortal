<?php

namespace Tests\Controllers;

use PHPUnit\Framework\TestCase;
use Portal\Models\StageModel;
use Portal\Controllers\CreateStageController;

class CreateStageControllerTest extends TestCase
{
    public function testSuccessConstruct()
    {
        $stageModel = $this->createMock(StageModel::class);
        $case = new CreateStageController($stageModel);
        $expected = CreateStageController::class;
        $this->assertInstanceOf($expected, $case);
    }
}
