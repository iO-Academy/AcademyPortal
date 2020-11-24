<?php

namespace Tests\Controllers\API;

use PHPUnit\Framework\TestCase;
use Portal\Models\StageModel;
use Portal\Controllers\API\AddStageOptionController;

class AddStageOptionControllerTest extends TestCase
{
    public function testSuccessConstruct()
    {
        $stageModel = $this->createMock(StageModel::class);
        $case = new AddStageOptionController($stageModel);
        $expected = AddStageOptionController::class;
        $this->assertInstanceOf($expected, $case);
    }
}
