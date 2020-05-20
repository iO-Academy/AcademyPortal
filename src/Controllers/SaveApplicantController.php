<?php

namespace Portal\Controllers;

use Exception;
use Portal\Abstracts\Controller;
use Portal\Entities\ApplicantEntity;
use Portal\Models\ApplicantModel;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class SaveApplicantController extends Controller
{
    private $applicantModel;

    /**
     * Instantiates SaveApplicantController.
     *
     * @param ApplicantModel $applicantModel userModel object dependency
     */
    public function __construct(ApplicantModel $applicantModel)
    {
        $this->applicantModel = $applicantModel;
    }

    /**
     * If user is logged in, invoke gets data from new applicant form and passes into insertNewApplicantToDb
     * function for inserting into database.
     * If successful Insert returns success true with message of application saved.
     *
     * @param Request $request
     * @param Response $response
     * @param array $args The arguments array
     *
     * @return Response, will return the data from successfulRegister and the statusCode, via Json.
     * @throws Exception
     */
    public function __invoke(Request $request, Response $response, array $args)
    {
        if ($_SESSION['loggedIn'] === true) {
            $data = ['success' => false, 'msg' => 'Application not saved', 'data' => []];
            $statusCode = 500;

            $newApplicationData = $request->getParsedBody();

            try {
                $applicant = new ApplicantEntity(
                    $newApplicationData['name'],
                    $newApplicationData['email'],
                    $newApplicationData['phoneNumber'],
                    $newApplicationData['cohortId'],
                    $newApplicationData['whyDev'],
                    $newApplicationData['codeExperience'],
                    $newApplicationData['hearAboutId'],
                    $newApplicationData['eligible'],
                    $newApplicationData['eighteenPlus'],
                    $newApplicationData['finance'],
                    $newApplicationData['notes']
                );
            } catch (Exception $e) {
                return $response->withStatus(400);
            }

            $successfulRegister = $this->applicantModel->insertNewApplicantToDb($applicant);

            if ($successfulRegister) {
                $data = [
                    'success' => $successfulRegister,
                    'msg' => 'Application Saved',
                    'data' => [$applicant]
                ];
                $statusCode = 200;
            }
            return $this->respondWithJson($response, $data, $statusCode);
        }
        return $response->withStatus(401);
    }
}
