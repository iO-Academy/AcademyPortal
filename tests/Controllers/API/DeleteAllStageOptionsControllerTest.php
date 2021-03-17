<?php

namespace Tests\Controllers\API;

use PHPUnit\Framework\TestCase;
use Portal\Controllers\API\DeleteAllStageOptionsController;
use Portal\Models\StageModel;

class DeleteAllStageOptionsControllerTest extends TestCase
{
    /**
     * Tests the controller constructor and checks the class type of the output
     *
     * @return void
     */
    public function testConstruct()
    {
        $stageModel = $this->createMock(StageModel::class);
        $case = new DeleteAllStageOptionsController($stageModel);
        $expected = DeleteAllStageOptionsController::class;

        $this->assertInstanceOf($expected, $case);
    }
}
