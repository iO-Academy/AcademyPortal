<?php

namespace Portal\Controllers\API;

use Portal\Abstracts\Controller;
use Portal\Interfaces\ApplicantModelInterface;
use Portal\Sanitisers\ApplicantSanitiser;
use Portal\Validators\ApplicantValidator;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class EditApplicantController extends Controller
{
    private $applicantModel;

    /**
     * EditApplicantController constructor.
     * @param $applicantModel
     */
    public function __construct(ApplicantModelInterface $applicantModel)
    {
        $this->applicantModel = $applicantModel;
    }

    public function __invoke(Request $request, Response $response, array $args)
    {
        if ($_SESSION['loggedIn'] === true) {
            $data = ['success' => false, 'msg' => 'Application not saved'];
            $statusCode = 500;
            $newApplicationData = $request->getParsedBody();

            try {
                if (
                    ApplicantValidator::validate($newApplicationData) &&
                    ApplicantValidator::validateAdditionalFields($newApplicationData)
                ) {
                    $applicant = ApplicantSanitiser::sanitise($newApplicationData);
                    $applicant = ApplicantSanitiser::sanitiseAdditionalFields($applicant);

                    //If applicant is being moved to a stage that makes them a student a row in the
                    // applicant_additional table needs to be created. If it doesn't already exist.

                    $successfulUpdate1 = $this->applicantModel->updateApplicant($applicant);

                    //Fails if applicant row doesn't exist in applicant_additional table
                    $successfulUpdate2 = $this->applicantModel->updateApplicantAdditionalFields($applicant);

                    if ($successfulUpdate1) {
                        $data['success'] = true;
                        $data['msg'] = 'Applicant has been updated!';
                        $statusCode = 200;
                    }
                } else {
                    throw new \Exception('Invalid applicant data');
                }
            } catch (\Exception $e) {
                $statusCode = 400;
                $data['msg'] = $e->getMessage();
            }
            return $this->respondWithJson($response, $data, $statusCode);
        }
        return $response->withStatus(401);
    }
}
