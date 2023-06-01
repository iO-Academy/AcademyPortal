<?php

namespace Portal\Controllers\API;

use Exception;
use Portal\Abstracts\Controller;
use Portal\Interfaces\ApplicantModelInterface;
use Portal\Models\ApplicantModel;
use Portal\Sanitisers\ApplicantSanitiser;
use Portal\Validators\ApplicantValidator;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class UpdateStudentProfileController extends Controller
{
    private ApplicantModel $applicantModel;

    public function __construct(ApplicantModel $applicantModel)
    {
        $this->applicantModel = $applicantModel;
    }

    public function __invoke(Request $request, Response $response, array $args): Response
    {
        $updatedStudentProfileData = $request->getParsedBody();

        if (
            (!empty($_SESSION['studentLogin']) &&
                $_SESSION['studentLogin'] &&
                $_SESSION['studentId'] == $updatedStudentProfileData['id']) ||
            (!empty($_SESSION['loggedIn']) &&
                $_SESSION['loggedIn'])
        ) {
            $responseBody["success"] = true;
            $responseBody["msg"] = "Success";
            $responseBody["data"] = [];
            $statusCode = 200;

            $responseArray = $this->validateEditableFields($updatedStudentProfileData);

            if ($responseArray['success']) {
                if (isset($updatedStudentProfileData['edaid'])) {
                    $this->applicantModel->updateEdaid(
                        $updatedStudentProfileData['id'],
                        $updatedStudentProfileData['edaid']
                    );
                }
                if (isset($updatedStudentProfileData['githubUsername'])) {
                    $this->applicantModel->updateGithubUsername(
                        $updatedStudentProfileData['id'],
                        $updatedStudentProfileData['githubUsername']
                    );
                }
                if (isset($updatedStudentProfileData['laptop'])) {
                    $this->applicantModel->updateLaptop(
                        $updatedStudentProfileData['id'],
                        $updatedStudentProfileData['laptop']
                    );
                }
                if (isset($updatedStudentProfileData['upfront'])) {
                    $this->applicantModel->updateUpfront(
                        $updatedStudentProfileData['id'],
                        $updatedStudentProfileData['upfront']
                    );
                }
            } else {
                $responseBody["success"] = false;
                $responseBody["msg"] = $responseArray['msg'];
                $statusCode = $responseArray['status'];
            }

            return $this->respondWithJson($response, $responseBody, $statusCode);
        }
        return $response->withStatus(401);
    }

    private function validateEditableFields(array $updatedStudentProfileData): array
    {
        $responseArray = [
            'success' => true,
            'msg' => 'success',
            'status' => 200
        ];

        $feePaymentMethods = $this->applicantModel->getFeePaymentMethods($updatedStudentProfileData["id"]);

        if (isset($updatedStudentProfileData["upfront"])) {
            $feePaymentMethods["upfront"] = $updatedStudentProfileData["upfront"];
        }
        if (isset($updatedStudentProfileData["edaid"])) {
            $feePaymentMethods["edaid"] = $updatedStudentProfileData["edaid"];
        }

        try {
            ApplicantValidator::validateFeePaymentMethods($feePaymentMethods);
        } catch (Exception $e) {
            $responseArray["success"] = false;
            $responseArray["msg"] = $e->getMessage();
            $responseArray["status"] = 400;
        }

        if (isset($updatedStudentProfileData['laptop'])) {
            if (!ApplicantValidator::validateLaptop($updatedStudentProfileData)) {
                $responseArray["success"] = false;
                $responseArray["msg"] = "Incorrect input for laptop requirement";
                $responseArray["status"] = 400;
            }
        }

        if (isset($updatedStudentProfileData['githubUsername'])) {
            try {
                if (!ApplicantValidator::validateGithubUsername($updatedStudentProfileData)) {
                    $responseArray["success"] = false;
                    $responseArray["msg"] = "Incorrect input for GitHub username";
                    $responseArray["status"] = 400;
                }
            } catch (Exception $e) {
                $responseArray["success"] = false;
                $responseArray["msg"] = $e->getMessage();
                $responseArray["status"] = 400;
            }
        }

        return $responseArray;
    }
}
