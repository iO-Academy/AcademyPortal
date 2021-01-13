<?php

namespace Tests\Controllers\API;

use PHPUnit\Framework\TestCase;
use Portal\Models\StageModel;
use Portal\Controllers\API\AddStageController;

class AddStageControllerTest extends TestCase
{
    public function testSuccessConstruct()
    {
        $stageModel = $this->createMock(StageModel::class);
        $case = new AddStageController($stageModel);
        $expected = AddStageController::class;
        $this->assertInstanceOf($expected, $case);
    }
}
