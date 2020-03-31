<?php

namespace Portal\Controllers;

use \Slim\Http\Request as Request;
use \Slim\Http\Response as Response;
use Portal\Models\ApplicantModel;

class DeleteApplicantController
{
    private $applicantModel;

    public function __construct(ApplicantModel $applicantModel)
    {
        $this->applicantModel = $applicantModel;
    }

    public function __invoke(Request $request, Response $response, array $args)
    {
        // if ($_SESSION['loggedIn'] === true) {
            $data = ['success' => false, 'msg' => 'Applicant not found.'];
            $response = $response->withStatus(500);
            
            $requestData = $request->getParsedBody();
            
            if (isset($requestData['id'])) {
                $validatedRequestData = filter_var($requestData['id'], FILTER_VALIDATE_INT);
                
                if ($validatedRequestData) {
                    $applicantData = $this->applicantModel->getApplicantById($validatedRequestData);
                    if ($applicantData) {
                        if ($this->applicantModel->deleteApplicant($validatedRequestData)) {
                            $data = ['success' => true, 'msg' => 'Applicant has been deleted successfully.'];
                            $response = $response->withStatus(200);
                        } 
                    }
                } else {
                    $data = ['msg' => 'Invalid id provided.'];
                }
            } else {
                $data = ['msg' => 'No id provided.'];
            }

            return $response->withJson($data);

        // }
    }
}
