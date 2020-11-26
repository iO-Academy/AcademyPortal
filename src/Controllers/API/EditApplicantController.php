<?php


namespace Portal\Controllers\API;

use Portal\Abstracts\Controller;
use Portal\Entities\ApplicantEntity;
use Portal\Entities\CompleteApplicantEntity;
use Portal\Interfaces\ApplicantEntityInterface;
use Portal\Interfaces\ApplicantModelInterface;
use Portal\Validators\EditApplicantFormDataValidator;
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
            $isValid = EditApplicantFormDataValidator::applicantFormDataValidator($newApplicationData);
            if ($isValid) {
                var_dump($newApplicationData);
                exit;
                //If applicant is being moved to a stage that makes them a student a row in the
                // applicant_additional table needs to be created. If it doesn't already exist.
                $successfulUpdate1 = $this->applicantModel->updateApplicant($newApplicationData);
                var_dump(1);
                exit;
                //Fails if applicant row doesn't exist in applicant_additional table
                $successfulUpdate2 = $this->applicantModel->updateApplicantAdditionalFields($newApplicationData);

                if ($successfulUpdate1) {
                    $data['success'] = true;
                    $data['msg'] = 'Applicant has been updated!';
                    $statusCode = 200;
                }
            } else  {
                $statusCode = 400;
                $data['msg'] = 'Form data failed validation';
            }
            return $this->respondWithJson($response, $data, $statusCode);
        }
        return $response->withStatus(401);
    }
}
