<?php

namespace Tests\Controllers\FrontEnd;

use PHPUnit\Framework\TestCase;
use Portal\Controllers\FrontEnd\StudentProfilePageController;
use Portal\Models\ApplicantModel;
use Slim\Views\PhpRenderer;

class StudentProfilePageControllerTest extends TestCase
{
    public function testConstruct() {
        $renderer = $this->createMock(PhpRenderer::class);
        $applicantModel = $this->createMock(ApplicantModel::class);
        $result = new StudentProfilePageController($renderer, $applicantModel);
        $expected = StudentProfilePageController::class;
        $this->assertInstanceOf($expected, $result);

    }
}