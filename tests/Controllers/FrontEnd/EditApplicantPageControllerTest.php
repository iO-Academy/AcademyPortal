<?php

namespace Tests\Controllers\FrontEnd;

use Portal\Controllers\FrontEnd\EditApplicantPageController;
use Portal\Interfaces\ApplicantModelInterface;
use Portal\Models\ApplicantModel;
use Portal\Models\StageModel;
use Slim\Views\PhpRenderer;
use Tests\TestCase;

class EditApplicantPageControllerTest extends TestCase
{
    public function testConstruct()
    {
        $renderer = $this->createMock(PhpRenderer::class);
        $applicant = $this->createMock(ApplicantModelInterface::class);
        $stage = $this->createMock(StageModel::class);
        $case = new EditApplicantPageController($applicant, $stage, $renderer);
        $expected = EditApplicantPageController::class;
        $this->assertInstanceOf($expected, $case);
    }
}
