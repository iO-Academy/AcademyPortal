<?php

namespace Portal\Controllers\API;

use Exception;
use Portal\Abstracts\Controller;
use Portal\Entities\ApplicantEntity;
use Portal\Models\ApplicantModel;
use Portal\Sanitisers\ApplicantSanitiser;
use Portal\Validators\ApplicantValidator;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class AddApplicantController extends Controller
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
            $data = ['success' => false, 'msg' => 'Application not saved'];
            $statusCode = 500;

            $newApplicationData = $request->getParsedBody();

            try {
                if (ApplicantValidator::validate($newApplicationData)) {
                    $applicant = ApplicantSanitiser::sanitise($newApplicationData);
                } else {
                    throw new Exception('Applicant data failed validation');
                }
            } catch (Exception $e) {
                $statusCode = 400;
                $data['msg'] = $e->getMessage();
                return $this->respondWithJson($response, $data, $statusCode);
            }

            $successfulRegister = $this->applicantModel->storeApplicant($applicant);

            if ($successfulRegister) {
                $data = [
                    'success' => $successfulRegister,
                    'msg' => 'Application successfully saved!'
                ];
                $statusCode = 200;
            }
            return $this->respondWithJson($response, $data, $statusCode);
        }
        return $response->withStatus(401);
    }
}
