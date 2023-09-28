<?php

namespace Portal\Controllers\API;

use Portal\Abstracts\Controller;
use Portal\Models\ApplicantModel;
use Portal\Models\AptitudeTestModel;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class GetApplicantAptitudeController extends Controller
{
    private AptitudeTestModel $aptitudeTestModel;
    private ApplicantModel $applicantModel;

    public function __construct(AptitudeTestModel $aptitudeTestModel, ApplicantModel $applicantModel)
    {
        $this->aptitudeTestModel = $aptitudeTestModel;
        $this-> applicantModel = $applicantModel;
    }

    public function __invoke(Request $request, Response $response, array $args): Response
    {
        $responseBody = [
            'success' => false,
            'message' => "Unexpected Error",
            'data' => []
        ];

        $requestBody = $request->getQueryParams();
        if (!empty($requestBody['email'])) {
            $apiResponse = $this->aptitudeTestModel->sendEmailToApi($requestBody['email']);
        } else {
            $responseBody['message'] = 'No Email found';
            return $this->respondWithJson($response, $responseBody, 400);
        }
        if (is_array($apiResponse) && $apiResponse['success']) {
            $apiResultResponse = $this->aptitudeTestModel->sendIdToApi($apiResponse['data']['id']);
        } else {
            if (is_array($apiResponse)) {
                $responseBody['message'] = 'User not found in aptitude test system';
//                var_dump($responseBody['message']);
                return $this->respondWithJson($response, $responseBody, 404);
            } else {
                $responseBody['message'] = 'Aptitude test system currently unavailable';
                return $this->respondWithJson($response, $responseBody, 503);
            }
        }
        if (is_array($apiResultResponse) && $apiResultResponse['success']) {
            $applicant = $this->applicantModel->getApplicantByEmail($requestBody['email']);
            $success = $this->applicantModel->setAptitudeScore($applicant['id'], $apiResultResponse['data']['score']);
            if ($success) {
                $responseBody = [
                    'success' => true,
                    'message' => "Found aptitude test score",
                    'data' => ['score' => $apiResultResponse['data']['score']]
                ];
                return $this->respondWithJson($response, $responseBody, 200);
            } else {
                return $this->respondWithJson($response, $responseBody, 500);
            }
        } else {
            if (is_array($apiResultResponse)) {
                $responseBody['message'] = 'User not yet taken aptitude test';
                return $this->respondWithJson($response, $responseBody, 400);
                var_dump($responseBody['message']);
                exit;
            } else {
                $responseBody['message'] = 'Aptitude test system currently unavailable';
                return $this->respondWithJson($response, $responseBody, 503);
            }
        }
    }
}
