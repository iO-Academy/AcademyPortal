<?php

namespace Tests\Controllers\FrontEnd;

use Portal\Controllers\FrontEnd\StudentApplicationFormPageController;
use Portal\Models\ApplicationFormModel;
use Slim\Views\PhpRenderer;

class StudentApplicationFormPageControllerTest
{
    public function testConstruct()
    {
        $renderer = $this->createMock(PhpRenderer::class);
        $model = $this->createMock(ApplicationFormModel::class);
        $case = new StudentApplicationFormPageController($model, $renderer);
        $expected = StudentApplicationFormPageController::class;
        $this->assertInstanceOf($expected, $case);
    }
}
