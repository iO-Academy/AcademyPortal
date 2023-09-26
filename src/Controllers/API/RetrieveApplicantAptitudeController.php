<?php

namespace Portal\Controllers\API;

use Portal\Abstracts\Controller;
use Portal\Models\ApplicantModel;
use Portal\Models\AptitudeTestModel;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\PhpRenderer;


class RetrieveApplicantAptitudeController extends Controller

{
    private AptitudeTestModel $model;

    public function __construct(AptitudeTestModel $model)
    {
        $this->model = $model;
    }

    public function __invoke(Request $request, Response $response, array $args): Response
    {
        $requestBody = $request->getQueryParams();
        if (!empty($requestBody['email'])) {
            $apiResponse = $this->model->sendEmailToApi($requestBody['email']);
            if($apiResponse['success']) {
                // use model to curl for result
            } else {
                [“Not yet taken”]
            }

        }
        return $response;
    }
}
