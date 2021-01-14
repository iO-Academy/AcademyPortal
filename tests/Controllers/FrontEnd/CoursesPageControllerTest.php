<?php

namespace Tests\Controllers\FrontEnd;

use Tests\TestCase;
use Portal\Controllers\FrontEnd\CoursesPageController;
use Portal\Models\CourseModel;
use Slim\Views\PhpRenderer;

class CoursesPageControllerTest extends TestCase
{

    public function testConstruct()
    {
        $mockRender = $this->createMock(PhpRenderer::class);
        $mockModel = $this->createMock(CourseModel::class);
        $case = new CoursesPageController($mockRender, $mockModel);
        $expected = CoursesPageController::class;
        $this->assertInstanceOf($expected, $case);
    }
}
