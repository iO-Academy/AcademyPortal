<?php

namespace Portal\Controllers;

use Portal\Abstracts\Controller;
use Portal\Models\ApplicantModel;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\PhpRenderer;

class EditApplicantController extends Controller
{
    private $applicantModel;
    private $renderer;
    /**
     * EditApplicantController constructor.
     * @param ApplicantModel $applicantModel
     * @param PhpRenderer $renderer
     */
    public function __construct(ApplicantModel $applicantModel, PhpRenderer $renderer)
    {
        $this->applicantModel = $applicantModel;
        $this->renderer = $renderer;
    }

    public function __invoke(Request $request, Response $response, array $args)
    {
        $applicant = $this->applicantModel->getApplicantById($args['id']);
        return $this->renderer->render($response, 'applicantForm.phtml', [
            'applicantName' => $applicant->getName(),
            'applicantEmail' => $applicant->getEmail(),
            'applicantPhoneNumber' => $applicant->getPhoneNumber(),
            'applicantCohortId' => $applicant->getCohortId(),
            'applicantWhyDev' => $applicant->getWhyDev(),
            'applicantCodeExperience' => $applicant->getCodeExperience(),
            'applicantHearAboutId' => $applicant->getHearAboutId(),
            'applicantEligible' => $applicant->getEligible(),
            'applicantEighteenPlus' => $applicant->getEighteenPlus(),
            'applicantFinance' => $applicant->getFinance(),
            'applicantNotes' => $applicant->getNotes()
        ]);
    }
}
