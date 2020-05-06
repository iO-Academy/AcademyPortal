<?php

namespace Portal\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Portal\Models\ApplicantModel;

class DeleteApplicantController
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
                'msg' => 'Applicant not found.',
                'data' => []
            ];
            $statusCode = 500;

            $requestData = $request->getParsedBody();

            if (isset($requestData['id'])) {
                $validatedRequestData = filter_var($requestData['id'], FILTER_VALIDATE_INT);

                if ($validatedRequestData) {
                    $applicantData = $this->applicantModel->getApplicantById($validatedRequestData);
                    if ($applicantData) {
                        if ($this->applicantModel->deleteApplicant($validatedRequestData)) {
                            $data = [
                                'success' => true,
                                'msg' => 'Applicant has been deleted successfully.',
                                'data' => []
                            ];
                            $statusCode = 200;
                        }
                    }
                } else {
                    $data = [
                        'success' => false,
                        'msg' => 'Invalid id provided.',
                        'data' => []
                    ];
                }
            } else {
                $data = [
                    'success' => false,
                    'msg' => 'Invalid id provided.',
                    'data' => []
                ];
            }
            $response->getBody()->write(json_encode($data));
            return $response->withStatus($statusCode);
        }
    }
}