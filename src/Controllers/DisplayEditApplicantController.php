<?php

namespace Portal\Controllers;

use Portal\Abstracts\Controller;
use Portal\Interfaces\ApplicantModelInterface;
use Portal\Models\ApplicantModel;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\PhpRenderer;

class DisplayEditApplicantController extends Controller
{
    private $applicantModel;
    private $renderer;
    /**
     * DisplayEditApplicantController constructor.
     * @param ApplicantModelInterface $applicantModel
     * @param PhpRenderer $renderer
     */
    public function __construct(ApplicantModelInterface $applicantModel, PhpRenderer $renderer)
    {
        $this->applicantModel = $applicantModel;
        $this->renderer = $renderer;
    }

    public function __invoke(Request $request, Response $response, array $args)
    {
        if ($_SESSION['loggedIn'] === true) {
            $id = $request->getQueryParams()['id'];
            $applicant = $this->applicantModel->getApplicantById($id);
            $data = [
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
            ];

            return $this->renderer->render($response, 'applicantForm.phtml', $data);
        }
        return $response->withStatus(401);
    }
}
