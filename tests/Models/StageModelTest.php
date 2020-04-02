<?php

namespace Tests\Models;

use PHPUnit\Framework\TestCase;
use Portal\Models\StageModel;

class StageModelTest extends TestCase
{
    public function testConstruct()
    {
        $db = $this->createMock(\PDO::class);
        $case = new StageModel($db);
        $expected = StageModel::class;
        $this->assertInstanceOf($expected, $case);
    }
}
