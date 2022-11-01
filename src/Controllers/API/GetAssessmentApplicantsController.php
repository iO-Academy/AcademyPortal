<?php

namespace Portal\Controllers\API;

use Portal\Abstracts\Controller;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Portal\Models\ApplicantModel;

class GetAssessmentApplicantsController extends Controller
{
    private ApplicantModel $applicantModel;

    public function __construct(ApplicantModel $applicantModel)
    {
        $this->applicantModel = $applicantModel;
    }

    /**
     * Gets applicants with a booked assessment date.
     */
    public function __invoke(Request $request, Response $response, array $args): Response
    {
            $applicants = $this->applicantModel->getAssessmentApplicants();
            return $this->respondWithJson($response, $applicants);
    }
}
