<?php

namespace Tests\Controllers\API;

use PHPUnit\Framework\TestCase;
use Portal\Controllers\API\GetStagesController;
use Portal\Models\StageModel;

class GetStagesControllerTest extends TestCase
{
    public function testConstruct()
    {
        $stageModel = $this->createMock(StageModel::class);
        $case = new GetStagesController($stageModel);
        $expected = GetStagesController::class;
        $this->assertInstanceOf($expected, $case);
    }
}
