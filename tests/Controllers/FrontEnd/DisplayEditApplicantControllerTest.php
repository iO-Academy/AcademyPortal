<?php


namespace Tests\Controllers\FrontEnd;

use Portal\Controllers\FrontEnd\DisplayEditApplicantController;
use Portal\Interfaces\ApplicantModelInterface;
use Portal\Models\ApplicantModel;
use Portal\Models\StageModel;
use Slim\Views\PhpRenderer;
use Tests\TestCase;

class DisplayEditApplicantControllerTest extends TestCase
{
    public function testConstruct()
    {
        $renderer = $this->createMock(PhpRenderer::class);
        $applicant = $this->createMock(ApplicantModelInterface::class);
        $stage = $this->createMock(StageModel::class);
        $case = new DisplayEditApplicantController($applicant, $stage, $renderer);
        $expected = DisplayEditApplicantController::class;
        $this->assertInstanceOf($expected, $case);
    }
}
