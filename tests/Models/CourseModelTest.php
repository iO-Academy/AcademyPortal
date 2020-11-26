<?php

namespace Tests\Models;

use Tests\TestCase;
use Portal\Models\CourseModel;

class CourseModelTest extends TestCase
{
    public function testConstruct()
    {
        $db = $this->createMock(\PDO::class);
        $case = new CourseModel($db);
        $expected = CourseModel::class;
        $this->assertInstanceOf($expected, $case);
    }
}
