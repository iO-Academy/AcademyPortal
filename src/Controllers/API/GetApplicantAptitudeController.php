<?php

namespace Portal\Controllers\API;

use Portal\Abstracts\Controller;
use Portal\Models\ApplicantModel;
use Portal\Models\AptitudeTestModel;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\PhpRenderer;

class GetApplicantAptitudeController extends Controller
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
            if (is_array($apiResponse) && $apiResponse['success']) {
                $apiResultResponse = $this->model->sendIdToApi($apiResponse['data']['id']);
                if (is_array($apiResultResponse) && $apiResultResponse['success']) {
                    $data = [
                        'success' => true,
                        'msg' => "Found aptitude test score",
                        'data' => ['score' => $apiResultResponse['data']['score']]
                    ];
                    $statusCode = 200;
                    return $this->respondWithJson($response, $data, $statusCode);
                }


                } else {

            }
        }
        return $response;
    }
}

//if (is_array($apiResponse) && $apiResponse['success']) {
//    $idResponse = $this->model->sendIdToApi($requestBody['Id']);