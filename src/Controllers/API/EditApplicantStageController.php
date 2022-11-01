<?php

namespace Portal\Controllers\API;

use Portal\Abstracts\Controller;
use Portal\Models\ApplicantModel;
use Portal\Models\StageModel;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class EditApplicantStageController extends Controller
{
    private ApplicantModel $applicantModel;
    private StageModel $stageModel;

    public function __construct(ApplicantModel $applicantModel, StageModel $stageModel)
    {
        $this->applicantModel = $applicantModel;
        $this->stageModel = $stageModel;
    }

    public function __invoke(Request $request, Response $response, array $args): Response
    {
        if ($_SESSION['loggedIn'] === true) {
            $applicantId = (int) $request->getQueryParams()['applicantId'];
            $newStage = (int) $request->getQueryParams()['stageId'];
            $optionIdValue =  $request->getQueryParams()['optionId'] ?? null;
            $result = $this->applicantModel->updateApplicantStageAndOptionIds($applicantId, $newStage, $optionIdValue);
            if ($result) {
                $newStageEntity = $this->stageModel->getStageById($newStage);
                $newOption = $this->stageModel->getOptionById($optionIdValue);
                $data = [
                    'success' => true,
                    'message' => 'Successfully updated Applicant to Next Stage with Options',
                    'data' => []
                ];

                $data['data']['option'] = $newOption;
                $data['data']['newStageName'] = $newStageEntity->getStageTitle();
                $data['data']['stageId'] = $newStage;
                $data['data']['currentOrder'] = $newStageEntity->getStageOrder();
                $data['data']['isLastStage'] = $this->stageModel->getHighestOrderNo();
                return $this->respondWithJson($response, $data, 200);
            }
            $data = [
                'success' => false,
                'message' => 'Something went wrong when trying to update the Applicant\'s Stage 
                            and Option IDs into the database',
                'data' => []
            ];
            return $this->respondWithJson($response, $data, 500);
        } else {
            $data = [
                'success' => false,
                'message' => 'Not logged in.',
                'data' => []
            ];
            return $this->respondWithJson($response, $data, 541);
        }
    }
}
