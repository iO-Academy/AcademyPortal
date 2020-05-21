<?php


namespace Portal\Controllers;

use Portal\Abstracts\Controller;
use Portal\Entities\ApplicantEntity;
use Portal\Interfaces\ApplicantModelInterface;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use function DI\get;

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
            $data = ['success' => false, 'msg' => 'Application not saved', 'data' => []];
            $statusCode = 500;

            $applicationData = $request->getParsedBody();

            try {
                $applicant = new ApplicantEntity(
                    $applicationData['id'],
                    $applicationData['name'],
                    $applicationData['email'],
                    $applicationData['phoneNumber'],
                    $applicationData['cohortId'],
                    $applicationData['whyDev'],
                    $applicationData['codeExperience'],
                    $applicationData['hearAboutId'],
                    $applicationData['eligible'],
                    $applicationData['eighteenPlus'],
                    $applicationData['finance'],
                    $applicationData['notes']
                );

            } catch (\Exception $e) {
                return $response->withStatus(400);
            }

            $successfulUpdate = $this->applicantModel->updateApplicant($applicant);

            if ($successfulUpdate) {
                $data = [
                    'success' => $successfulUpdate,
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
