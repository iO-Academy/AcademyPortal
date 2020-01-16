<?php

namespace Tests\Models;

use Tests\TestCase;
use Portal\Models\EventModel;

class EventModelTest extends TestCase
{
    public function testConstruct()
    {
        $db = $this->createMock(\PDO::class);
        $case = new EventModel($db);
        $expected = EventModel::class;
        $this->assertInstanceOf($expected, $case);
    }
}
