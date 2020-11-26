<?php


namespace Portal\Controllers\API;

use Portal\Abstracts\Controller;
use Portal\Entities\ApplicantEntity;
use Portal\Entities\CompleteApplicantEntity;
use Portal\Interfaces\ApplicantEntityInterface;
use Portal\Interfaces\ApplicantModelInterface;
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
            var_dump($newApplicationData);
            try {
                $applicant = new CompleteApplicantEntity(
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
                    $newApplicationData['notes'],
                    $newApplicationData['id'],
                    $newApplicationData['apprentice'],
                    $newApplicationData['aptitude'],
                    $newApplicationData['assessmentDay'],
                    $newApplicationData['assessmentTime'],
                    $newApplicationData['assessmentNotes'],
                    $newApplicationData['diversitechInterest'],
                    $newApplicationData['diversitech'],
                    $newApplicationData['edaid'],
                    $newApplicationData['upfront'],
                    $newApplicationData['kitCollectionDay'],
                    $newApplicationData['kitCollectionTime'],
                    $newApplicationData['kitNum'],
                    $newApplicationData['laptop'],
                    $newApplicationData['laptopDeposit'],
                    $newApplicationData['laptopNum'],
                    $newApplicationData['tasterId'],
                    $newApplicationData['tasterAttendance']
                );

                $successfulUpdate1 = $this->applicantModel->updateApplicant($applicant);
                $successfulUpdate2 = $this->applicantModel->updateApplicantAdditionalFields($applicant);

                if ($successfulUpdate1 && $successfulUpdate2) {
                    $data['success'] = true;
                    $data['msg'] = 'Applicant has been updated!';
                    $statusCode = 200;
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
