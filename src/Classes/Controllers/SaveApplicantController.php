<?php

namespace Portal\Controllers;

use Portal\Entities\ApplicantEntity;
use Portal\Models\ApplicantModel;
use Slim\Http\Request;
use Slim\Http\Response;

class SaveApplicantController
{
    private $applicantModel;

    /**
     * Instantiates SaveApplicantController
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
     *
     * @return Response
     */
    function __invoke(Request $request, Response $response)
    {
        if ($_SESSION['loggedIn'] === true) {
            $data = ['success' => false, 'msg' => 'Application not saved', 'data' => []];
            $statusCode = 401;

            $newApplicationData = $request->getParsedBody();

            $applicant = new ApplicantEntity();
            $validatedApplicationData = [
                'name'           => filter_var($newApplicationData['name'], FILTER_SANITIZE_STRING),
                'email'          => filter_var($newApplicationData['email'], FILTER_VALIDATE_EMAIL),
                'phoneNumber'    => filter_var($newApplicationData['phoneNumber'], FILTER_SANITIZE_STRING),
                'cohortId'       => (int)$newApplicationData['cohortId'],
                'whyDev'         => filter_var($newApplicationData['whyDev'], FILTER_SANITIZE_STRING),
                'codeExperience' => filter_var($newApplicationData['codeExperience'], FILTER_SANITIZE_STRING),
                'hearAboutId'    => (int)$newApplicationData['hearAboutId'],
                'eligible'       => $newApplicationData['eligible'] ? 1 : 0,
                'eighteenPlus'   => $newApplicationData['eighteenPlus'] ? 1 : 0,
                'finance'        => $newApplicationData['finance'] ? 1 : 0,
                'notes'          => filter_var($newApplicationData['notes'], FILTER_SANITIZE_STRING)
            ];

            $successfulRegister = $this->applicantModel->insertNewApplicantToDb(
                $validatedApplicationData['name'],
                $validatedApplicationData['email'],
                $validatedApplicationData['phoneNumber'],
                $validatedApplicationData['cohortId'],
                $validatedApplicationData['whyDev'],
                $validatedApplicationData['codeExperience'],
                $validatedApplicationData['hearAboutId'],
                $validatedApplicationData['eligible'],
                $validatedApplicationData['eighteenPlus'],
                $validatedApplicationData['finance'],
                $validatedApplicationData['notes']
            );

            if ($successfulRegister) {
                $data = [
                    'success' => $successfulRegister,
                    'msg'     => 'Application Saved',
                    'data'    => []
                ];
                $statusCode = 200;
            }
            return $response->withJson($data, $statusCode);
        }
    }
}
