<?php

namespace Tests\Controllers\API;

use PHPUnit\Framework\TestCase;
use Portal\Controllers\API\EditStageOptionController;
use Portal\Models\StageModel;

class EditStageOptionControllerTest extends TestCase
{
    /**
     * Tests the controller constructor and checks the class type of the output
     *
     * @return void
     */
    public function testConstruct()
    {
        $stageModel = $this->createMock(StageModel::class);
        $case = new EditStageOptionController($stageModel);
        $expected = EditStageOptionController::class;

        $this->assertInstanceOf($expected, $case);
    }
}
