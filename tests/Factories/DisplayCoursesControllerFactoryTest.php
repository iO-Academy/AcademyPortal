<?php

namespace Test\Factories;

use Tests\TestCase;
use Portal\Controllers\FrontEnd\DisplayCoursesController;
use Portal\Models\CourseModel;
use Slim\Views\PhpRenderer;

class DisplayCoursesControllerFactoryTest extends TestCase
{

    public function testDisplayCoursesPageControllerFactory()
    {
        $renderer = $this->createMock(PhpRenderer::class);
        $model = $this->createMock(CourseModel::class);
        $case = new DisplayCoursesController($renderer, $model);
        $expected = DisplayCoursesController::class;
        $this->assertInstanceOf($expected, $case);
    }
}
