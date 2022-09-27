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
        $responseBody = [
            'message' => 'Success',
            'data' => []
        ];

        $matchedApplicantByEmail = $this->applicantModel->getApplicantByEmail($applicantEmail);
        if (!isset($matchedApplicantByEmail)) {
            $responseBody['message'] = 'Aptitude score not added - email not found';

            return $this->respondWithJson($response, $responseBody);
        }

        if (
            !isset($aptitudeScore)
            || $aptitudeScore < 0
            || $aptitudeScore > 100
            || !is_int($aptitudeScore)
        ) {
            $responseBody['message'] = 'Aptitude score not added - invalid data provided.';

            return $this->respondWithJson($response, $responseBody);
        }

        $applicantId = $matchedApplicantByEmail['id'];

        $aptitudeFromId = $this->applicantModel->getAptitudeScore($applicantId);
        if (is_null($aptitudeFromId)) {
            $this->applicantModel->submitApplicantAptitudeScore($applicantId, $aptitudeScore);
            $responseBody['message'] = 'Test';
            return $this->respondWithJson($response, $responseBody);


        } else {
//            return '';
            $responseBody['message'] = 'Hello World, work please';
            return $this->respondWithJson($response, $responseBody);

        }


        $jsonResponseBody = json_encode($responseBody);
        $response->getBody()->write($jsonResponseBody);
        return $response;
    }
}
