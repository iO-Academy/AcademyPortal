<?php

namespace Portal\Controllers\API;

use Portal\Abstracts\Controller;
use Portal\Models\ApplicantModel;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class AddAptitudeScoresController extends Controller
{
    private $applicantModel;

    /**
     * Instantiates AddApplicantPageController.
     *
     * @param ApplicantModel $applicantModel userModel object dependency
     */
    public function __construct(ApplicantModel $applicantModel)
    {
        $this->applicantModel = $applicantModel;
    }

    public function __invoke(Request $request, Response $response, array $args)
    {
        $data = [
            'success' => false,
            'message' => 'Aptitude score not added',
            'data' => []
        ];

        $statusCode = 500;
        $aptitudeData = $request->getParsedBody();

        if (empty($aptitudeData) || !isset($aptitudeData['email']) || !isset($aptitudeData['score'])) {

            $data['message'] = 'Aptitude score not added - invalid data supplied.';

            return $this->respondWithJson($response, $data, $statusCode);
        }

        $email = $aptitudeData['email'];
        $score = $aptitudeData['score'];

        $matchedApplicant = $this->applicantModel->getApplicantByEmail($email);

        if (!isset($matchedApplicant['email']) || $email != $matchedApplicant['email']) {
            $data['message'] = 'Aptitude score not added - email not found';

            return $this->respondWithJson($response, $data, $statusCode);
        }

        $data = [
            'success' => true,
            'message' => 'Aptitude score added successfully',
            'data' => ['matchedApplicant' => $matchedApplicant],
        ];
        
        $statusCode = 200;
        $this->applicantModel->setAptitudeScore($matchedApplicant['id'], $score);

        return $this->respondWithJson($response, $data, $statusCode);
    }
}