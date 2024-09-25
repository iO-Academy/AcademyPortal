<?php

namespace Portal\Controllers\API;

use Portal\Abstracts\Controller;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Portal\Models\ApplicantModel;

class GetStudentsController extends Controller
{
    private ApplicantModel $applicantModel;

    public function __construct(ApplicantModel $applicantModel)
    {
        $this->applicantModel = $applicantModel;
    }

    public function __invoke(Request $request, Response $response, array $args): Response
    {
        if ($_SESSION['loggedIn'] === true) {
            $get = $request->getQueryParams();

            $responseData = [
                'success' => true,
                'message' => 'Applicants found',
                'data' => []
            ];

            if (empty($get['cohortId'])) {
                $responseData['data'] = $this->applicantModel->getAllStudents();
            } else {
                $responseData['data'] = $this->applicantModel->getAllStudentsByCohort($get['cohortId']);
            }
            return $this->respondWithJson($response, $responseData);
        } else {
            return $response->withStatus(401);
        }
    }
}
