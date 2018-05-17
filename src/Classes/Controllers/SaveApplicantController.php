<?php

namespace Portal\Controllers;

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
     *
     *
     * @param Request $request HTTP request
     * @param Response $response HTTP response
     *
     * @return error/success message and status code
     */
    function __invoke(Request $request, Response $response)
    {

        if ($_SESSION['loggedIn'] === true) {

            $data = ['success' => false, 'msg' => 'Application not saved', 'data' => []];
            $statusCode = 401;

            $newApplicationData = $request->getParsedBody();
            $validatedApplicationData = [
                'name' => filter_var($newApplicationData['name'], FILTER_SANITIZE_STRING),
                'email' => filter_var($newApplicationData['email'], FILTER_SANITIZE_STRING),
                'phoneNumber' => filter_var($newApplicationData['phoneNumber'], FILTER_SANITIZE_STRING),
                'cohortId' => filter_var($newApplicationData['cohortId'], FILTER_SANITIZE_STRING),
                'whyDev' => filter_var($newApplicationData['whyDev'], FILTER_SANITIZE_STRING),
                'codeExperience' => filter_var($newApplicationData['codeExperience'], FILTER_SANITIZE_STRING),
                'hearAboutId' => filter_var($newApplicationData['hearAboutId'], FILTER_SANITIZE_STRING),
                'eligible' => filter_var($newApplicationData['eligible'], FILTER_SANITIZE_STRING),
                'eighteenPlus' => filter_var($newApplicationData['eighteenPlus'], FILTER_SANITIZE_STRING),
                'finance' => filter_var($newApplicationData['finance'], FILTER_SANITIZE_STRING)
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
                    $validatedApplicationData['finance']
                );

            if ($successfulRegister) {
                $data = [
                    'success' => $successfulRegister,
                    'msg' => 'Application Saved',
                    'data' => []
                ];
                $statusCode = 200;
            }

            return $response->withJson($data, $statusCode);

        }
    }

}