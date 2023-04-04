<?php

namespace Portal\Controllers\API;

use Portal\Abstracts\Controller;
use Portal\Interfaces\ApplicantModelInterface;
use Portal\Models\ApplicantModel;
use Portal\Sanitisers\ApplicantSanitiser;
use Portal\Validators\ApplicantValidator;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;


class UpdateStudentProfileController
{
    private ApplicantModel $applicantModel; 

    public function __construct(ApplicantModel $applicantModel) 
    {
        $this->applicantModel = $applicantModel;
    }

    public function invoke(Request $request, Response $response, array $args) : Response 
    {
        if ($_SESSION['loggedIn'] === true) {
            $data = ['success' => false, 'msg' => 'Application not saved'];
            $statusCode = 500;
            $updatedStudentProfileData = $request->getParsedBody();

            try {
                if(array_key_exists($updatedStudentProfileData["edaid"])) {
                    if(ApplicantValidator::validateFeePaymentMethods($updatedStudentProfileData)){
                        
                    }
                } else if(array_key_exists($updatedStudentProfileData["upfront"])) {

                } else if(array_key_exists($updatedStudentProfileData["githubUser"])) {

                } else if(array_key_exists($updatedStudentProfileData["laptop"])) {
                
                } else {}

           } catch {
            }    
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

}