<?php

namespace Portal\Controllers\API;

use Portal\Abstracts\Controller;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Portal\Models\ApplicantModel;

class GetAssessmentApplicantsController extends Controller
{
    private $applicantModel;

    /**
     * GetApplicantController constructor.
     *
     * @param ApplicantModel $applicantModel
     */
    public function __construct(ApplicantModel $applicantModel)
    {
        $this->applicantModel = $applicantModel;
    }

    /**
     * Gets applicants with a booked assessment date.
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    public function __invoke(Request $request, Response $response, array $args)
    {
            $applicants = $this->applicantModel->getAssessmentApplicants();
            return $this->respondWithJson($response, $applicants);
    }
}
