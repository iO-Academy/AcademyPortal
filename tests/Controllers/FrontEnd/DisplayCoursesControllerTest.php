<?php

namespace Tests\Controllers\FrontEnd;

use Tests\TestCase;
use Portal\Controllers\FrontEnd\DisplayCoursesController;
use Portal\Models\CourseModel;
use Slim\Views\PhpRenderer;

class DisplayCoursesControllerTest extends TestCase
{

    public function testConstruct()
    {
        $mockRender = $this->createMock(PhpRenderer::class);
        $mockModel = $this->createMock(CourseModel::class);
        $case = new DisplayCoursesController($mockRender, $mockModel);
        $expected = DisplayCoursesController::class;
        $this->assertInstanceOf($expected, $case);
    }
}
