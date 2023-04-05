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
            !empty($_SESSION['studentLogin']) &&
            $_SESSION['studentLogin'] &&
            $_SESSION['studentId'] == $updatedStudentProfileData['id'] ||
            !empty($_SESSION['loggedIn']) &&
            $_SESSION['loggedIn']
        ) {
            $responseBody = [];

            if (array_key_exists("edaid", $updatedStudentProfileData)) {
                $feePaymentMethods = $this->applicantModel->getFeePaymentMethods($updatedStudentProfileData);
                $feePaymentMethods["edaid"] = $updatedStudentProfileData["edaid"];

                try {
                    ApplicantValidator::validateFeePaymentMethods($feePaymentMethods);
                } catch (Exception $e) {
                    $responseBody["success"] = false;
                    $responseBody["msg"] = $e->getMessage();
                    $responseBody["data"] = [];
                    $statusCode = 400;
                    return $this->respondWithJson($response, $responseBody, $statusCode);
                }

                $updatedStudentProfileData["edaid"] =
                    ApplicantSanitiser::sanitiseEdAid($updatedStudentProfileData["edaid"]);
                $successfulUpdate = $this->applicantModel->updateEdaid($updatedStudentProfileData);

                if ($successfulUpdate) {
                    $responseBody["success"] = true;
                    $responseBody["msg"] = "Edaid field has been successfully updated.";
                    $responseBody["data"] = [];
                    $statusCode = 200;
                    return $this->respondWithJson($response, $responseBody, $statusCode);
                } else {
                    $responseBody["success"] = false;
                    $responseBody["msg"] = "Edaid field could not be updated.";
                    $responseBody["data"] = [];
                    $statusCode = 500;
                    return $this->respondWithJson($response, $responseBody, $statusCode);
                }
            } elseif (array_key_exists("upfront", $updatedStudentProfileData)) {
                $feePaymentMethods = $this->applicantModel->getFeePaymentMethods($updatedStudentProfileData);
                $feePaymentMethods["upfront"] = $updatedStudentProfileData["upfront"];

                try {
                    ApplicantValidator::validateFeePaymentMethods($feePaymentMethods);
                } catch (Exception $e) {
                    $responseBody["success"] = false;
                    $responseBody["msg"] = $e->getMessage();
                    $responseBody["data"] = [];
                    $statusCode = 400;
                    return $this->respondWithJson($response, $responseBody, $statusCode);
                }

                $updatedStudentProfileData["upfront"] =
                    ApplicantSanitiser::sanitiseUpFront($updatedStudentProfileData["upfront"]);
                $successfulUpdate = $this->applicantModel->updateUpfront($updatedStudentProfileData);

                if ($successfulUpdate) {
                    $responseBody["success"] = true;
                    $responseBody["msg"] = "Upfront field has been successfully updated.";
                    $responseBody["data"] = [];
                    $statusCode = 200;
                    return $this->respondWithJson($response, $responseBody, $statusCode);
                } else {
                    $responseBody["success"] = false;
                    $responseBody["msg"] = "Upfront field could not be updated.";
                    $responseBody["data"] = [];
                    $statusCode = 500;
                    return $this->respondWithJson($response, $responseBody, $statusCode);
                }
            } elseif (array_key_exists("githubUsername", $updatedStudentProfileData)) {
                try {
                    if (!ApplicantValidator::validateGithubUsername($updatedStudentProfileData)) {
                        $responseBody["success"] = false;
                        $responseBody["msg"] = "Github username must be a string";
                        $responseBody["data"] = [];
                        $statusCode = 400;
                        return $this->respondWithJson($response, $responseBody, $statusCode);
                    }
                } catch (Exception $e) {
                    $responseBody["success"] = false;
                    $responseBody["msg"] = $e->getMessage();
                    $responseBody["data"] = [];
                    $statusCode = 400;
                    return $this->respondWithJson($response, $responseBody, $statusCode);
                }

                $updatedStudentProfileData["githubUsername"] =
                    ApplicantSanitiser::sanitiseGitHubUsername($updatedStudentProfileData["githubUsername"]);
                $successfulUpdate = $this->applicantModel->updateGithubUsername($updatedStudentProfileData);

                if ($successfulUpdate) {
                    $responseBody["success"] = true;
                    $responseBody["msg"] = "Github username field has been successfully updated.";
                    $responseBody["data"] = [];
                    $statusCode = 200;
                    return $this->respondWithJson($response, $responseBody, $statusCode);
                } else {
                    $responseBody["success"] = false;
                    $responseBody["msg"] = "Github username field could not be updated.";
                    $responseBody["data"] = [];
                    $statusCode = 500;
                    return $this->respondWithJson($response, $responseBody, $statusCode);
                }
            } elseif (array_key_exists("laptop", $updatedStudentProfileData)) {
                try {
                    if (!ApplicantValidator::validateLaptop($updatedStudentProfileData)) {
                        $responseBody["success"] = false;
                        $responseBody["msg"] = "Incorrect input for laptop requirement";
                        $responseBody["data"] = [];
                        $statusCode = 400;
                        return $this->respondWithJson($response, $responseBody, $statusCode);
                    }
                } catch (Exception $e) {
                    $responseBody["success"] = false;
                    $responseBody["msg"] = $e->getMessage();
                    $responseBody["data"] = [];
                    $statusCode = 400;
                    return $this->respondWithJson($response, $responseBody, $statusCode);
                }

                if ($updatedStudentProfileData["laptop"] === "Yes") {
                    $updatedStudentProfileData["laptop"] = true;
                } elseif ($updatedStudentProfileData["laptop"] === "No") {
                    $updatedStudentProfileData["laptop"] = false;
                }

                $updatedStudentProfileData["laptop"] =
                    ApplicantSanitiser::sanitiseLaptop($updatedStudentProfileData["laptop"]);
                $successfulUpdate = $this->applicantModel->updateLaptop($updatedStudentProfileData);

                if ($successfulUpdate) {
                    $responseBody["success"] = true;
                    $responseBody["msg"] = "Laptop field has been successfully updated.";
                    $responseBody["data"] = [];
                    $statusCode = 200;
                    return $this->respondWithJson($response, $responseBody, $statusCode);
                } else {
                    $responseBody["success"] = false;
                    $responseBody["msg"] = "Laptop field could not be updated.";
                    $responseBody["data"] = [];
                    $statusCode = 500;
                    return $this->respondWithJson($response, $responseBody, $statusCode);
                }
            } else {
                $responseBody["success"] = false;
                $responseBody["msg"] = "Unsupported field";
                $responseBody["data"] = [];
                $statusCode = 400;
                return $this->respondWithJson($response, $responseBody, $statusCode);
            }
        }
        return $response->withStatus(401);
    }
}
