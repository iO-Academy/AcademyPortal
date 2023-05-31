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
                $this->applicantModel->updateEditableFields($updatedStudentProfileData);
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

        if ($updatedStudentProfileData["upfront"]) {
            $feePaymentMethods["upfront"] = $updatedStudentProfileData["upfront"];
        }
        if ($updatedStudentProfileData["edaid"]) {
            $feePaymentMethods["edaid"] = $updatedStudentProfileData["edaid"];
        }

        try {
            ApplicantValidator::validateFeePaymentMethods($feePaymentMethods);
        } catch (Exception $e) {
            $responseArray["success"] = false;
            $responseArray["msg"] = $e->getMessage();
            $responseArray["status"] = 400;
        }

        if (!ApplicantValidator::validateLaptop($updatedStudentProfileData)) {
            $responseArray["success"] = false;
            $responseArray["msg"] = "Incorrect input for laptop requirement";
            $responseArray["status"] = 400;
        }

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

        return $responseArray;
    }
}
