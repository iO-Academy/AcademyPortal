<?php

namespace Tests\Controllers\API;

use PHPUnit\Framework\TestCase;
use Portal\Controllers\API\DeleteStageController;
use Portal\Models\StageModel;

class DeleteStageControllerTest extends TestCase
{
    /**
     * Tests the controller constructor and checks the class type of the output
     *
     * @return void
     */
    public function testConstruct()
    {
        $stageModel = $this->createMock(StageModel::class);
        $case = new DeleteStageController($stageModel);
        $expected = DeleteStageController::class;

        $this->assertInstanceOf($expected, $case);
    }
}
