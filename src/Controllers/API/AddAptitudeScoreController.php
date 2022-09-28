<?php

namespace Portal\Controllers\API;

use Portal\Abstracts\Controller;
use Portal\Models\ApplicantModel;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class AddAptitudeScoreController extends Controller
{
    private $applicantModel;
//* Instantiates AddApplicantPageController.
//*
//* @param ApplicantModel $applicantModel userModel object dependency
//*/
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
            'success' => false,
            'message' => '',
            'data' => []
        ];

        $applicantDataByEmail = $this->applicantModel->getApplicantByEmail($applicantEmail);
        if ($applicantDataByEmail == []) {
            $responseBody['message'] = 'Aptitude score not added - email not found';

            return $this->respondWithJson($response, $responseBody, 400);
        }

        if (
            !isset($aptitudeScore)
            || $aptitudeScore < 0
            || $aptitudeScore > 100
            || !is_int($aptitudeScore)
        ) {
            $responseBody['message'] = 'Aptitude score not added - invalid data provided.';

            return $this->respondWithJson($response, $responseBody, 400);
        }

        $applicantId = $applicantDataByEmail['id'];

        $aptitudeFromId = $this->applicantModel->getAptitudeScore($applicantId);
        if ($aptitudeFromId['aptitude'] == null) {
            $this->applicantModel->submitApplicantAptitudeScore($applicantId, $aptitudeScore);
            $responseBody['message'] = 'Updated the applicants aptitude score';
            $responseBody['success'] = true;
            return $this->respondWithJson($response, $responseBody, 200);
        } else {
            date_default_timezone_set("Europe/London");
            $assessmentNote = 'New aptitude test attempt ' . date("d/m/y") . ' ' . date("H:i")
                . "\r\n" . 'Score: ' . $aptitudeScore . '%' . "\r\n";
            $this->applicantModel->submitApplicantAssessmentNotes($applicantId, $assessmentNote);
            $responseBody['message'] = 'Updated the applicants assessment notes';
            $responseBody['success'] = true;
            return $this->respondWithJson($response, $responseBody, 200);
        }
    }
}
