<?php


namespace Portal\Controllers;

use Portal\Abstracts\Controller;
use Portal\Entities\ApplicantEntity;
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
                    $newApplicationData['notes'],
                    $newApplicationData['id']
                );
            } catch (\Exception $e) {
                $statusCode = 400;
                $data['msg'] = $e->getMessage();
                return $this->respondWithJson($response, $data, $statusCode);
            }

            $successfulRegister = $this->applicantModel->updateApplicant($applicant);

            $data['msg'] = $successfulRegister;


            if ($successfulRegister) {
                $data['success'] = $successfulRegister;
                $data['msg'] = 'Applicant has been updated!';
                $statusCode = 200;
            }
            return $this->respondWithJson($response, $data, $statusCode);
        }
        return $response->withStatus(401);
    }
}
