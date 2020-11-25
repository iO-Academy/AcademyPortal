<?php

namespace Tests\Controllers\API;

use Tests\TestCase;
use Portal\Controllers\API\GetCoursesController;
use Portal\Models\CourseModel;

class GetCoursesControllerTest extends TestCase
{

    public function testConstruct()
    {
        $courseModel = $this->createMock(CourseModel::class);

        $case = new GetCoursesController($courseModel);
        $expected = GetCoursesController::class;
        $this->assertInstanceOf($expected, $case);
    }
}
