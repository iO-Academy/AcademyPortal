<?php

namespace Portal\Controllers\API;

use Portal\Abstracts\Controller;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Portal\Models\ApplicantModel;

class GetApplicantController extends Controller
{
    private ApplicantModel $applicantModel;

    public function __construct(ApplicantModel $applicantModel)
    {
        $this->applicantModel = $applicantModel;
    }

    /**
     * Takes id from the get request and if id is valid returns relevant applicant
     * else returns 404
     */
    public function __invoke(Request $request, Response $response, array $args): Response
    {
        $id = $args['id'];
        if (is_numeric($id) && !empty($id)) {
            $applicant = $this->applicantModel->getApplicantById($id);
            return $this->respondWithJson($response, $applicant);
        } else {
            return $response->withStatus(404);
        }
    }
}
