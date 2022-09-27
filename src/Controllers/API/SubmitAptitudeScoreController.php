<?php

namespace Portal\Controllers\API;

use Portal\Abstracts\Controller;
use Portal\Models\ApplicantModel;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class SubmitAptitudeScoreController extends Controller
{
    private $applicantModel;

    public function __construct(ApplicantModel $applicantModel)
    {
        $this->applicantModel = $applicantModel;
    }
    public function __invoke(Request $request, Response $response, array $args)
    {
        $requestBody = $request->getParsedBody();
        $applicantEmail = $requestBody['email'];
        $aptitudeScore = $requestBody['aptitude'];
//        $this->applicantModel->submitAptitudeScore($applicantEmail, $aptitudeScore);
        $responseBody = [
            'message' => 'Success',
            'data' => []
        ];
        $jsonResponseBody = json_encode($responseBody);
        $response->getBody()->write($jsonResponseBody);
        return $response;
    }
}