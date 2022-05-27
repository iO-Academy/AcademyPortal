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
        $email = $aptitudeData['email'];
        $score = $aptitudeData['score'];

        $matchedApplicant = $this->applicantModel->getApplicantByEmail($email);
        $data = [
            'success' => false,
            'message' => 'Aptitude score not added',
            'data' => ['matchedApplicant' => $matchedApplicant],
        ];
        return $this->respondWithJson($response, $data, $statusCode);

//        $data = [
//            'success' => true,
//            'message' => 'Added to da',
//            'data' => ['matchedApplicant' => $matchedApplicant]
//        ];


//        return $this->applicantModel->setAptitudeScore(11, 66);
    }
}