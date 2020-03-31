<?php

namespace Portal\Controllers;

use phpDocumentor\Reflection\Types\Array_;
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
        $requestData = $request->getParsedBody();
        if (isset($requestData['id'])) {
            if ($applicantModel->deleteApplicant($requestData['id'])) {
                return $response->withStatus(200);
            } else {
                return $response->withStatus(500);
            }
        }
    }
}