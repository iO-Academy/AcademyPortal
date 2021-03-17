<?php

namespace Tests\Controllers\API;

use PHPUnit\Framework\TestCase;
use Portal\Controllers\API\DeleteStageOptionController;
use Portal\Models\StageModel;

class DeleteStageOptionControllerTest extends TestCase
{
    /**
     * Tests the controller constructor and checks the class type of the output
     *
     * @return void
     */
    public function testConstruct()
    {
        $stageModel = $this->createMock(StageModel::class);
        $case = new DeleteStageOptionController($stageModel);
        $expected = DeleteStageOptionController::class;

        $this->assertInstanceOf($expected, $case);
    }
}
