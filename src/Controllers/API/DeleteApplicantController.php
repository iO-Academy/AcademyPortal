<?php

namespace Portal\Controllers\API;

use Portal\Abstracts\Controller;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Portal\Models\ApplicantModel;

class DeleteApplicantController extends Controller
{
    private $applicantModel;

    /**
     * DeleteApplicantsController constructor saves an applicantModel
     * onto this object
     *
     * @param ApplicantModel $applicantModel
     */
    public function __construct(ApplicantModel $applicantModel)
    {
        $this->applicantModel = $applicantModel;
    }

    /**
     * Checks if user is logged in, validates the http request data and calls
     * the delete method on applicantModel
     *
     * @param Request $request
     * @param Response $response
     * @param array $args
     *
     * @return Response - Returns status 200/500 with message in Json
     */
    public function __invoke(Request $request, Response $response, array $args)
    {
        if ($_SESSION['loggedIn'] === true) {
            $data = [
                'success' => false,
                'message' => 'Applicant not found.',
                'data' => []
            ];
            $statusCode = 500;

            $requestData = $request->getParsedBody();

            if (isset($requestData['id']) && filter_var($requestData['id'], FILTER_VALIDATE_INT)) {
                $applicantData = $this->applicantModel->getApplicantById($requestData['id']);
                if ($applicantData) {
                    if ($this->applicantModel->deleteApplicant($requestData['id'])) {
                        $data = [
                            'success' => true,
                            'message' => 'Applicant has been deleted successfully.',
                            'data' => []
                        ];
                        $statusCode = 200;
                    } else {
                        $data['message'] = 'Unexpected error, could not delete applicant';
                    }
                }
            } else {
                $data = [
                    'success' => false,
                    'message' => 'Invalid id provided.',
                    'data' => []
                ];
            }
            return $this->respondWithJson($response, $data, $statusCode);
        }
    }
}
