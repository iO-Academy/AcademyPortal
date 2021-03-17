<?php

namespace Portal\Controllers\API;

use Portal\Abstracts\Controller;
use Portal\Interfaces\ApplicantModelInterface;
use Portal\Models\StageModel;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class EditApplicantStageController extends Controller
{
    private $applicantModel;
    private $stageModel;

    public function __construct(ApplicantModelInterface $applicantModel, StageModel $stageModel)
    {
        $this->applicantModel = $applicantModel;
        $this->stageModel = $stageModel;
    }

    public function __invoke(Request $request, Response $response, array $args)
    {
        if ($_SESSION['loggedIn'] === true) {
            $applicantId = (int) $request->getQueryParams()['applicantId'];
            $newStage = (int) $request->getQueryParams()['stageId'];
            $optionIdValue =  $request->getQueryParams()['optionId'] ?? null;
            $result = $this->applicantModel->updateApplicantStageAndOptionIds($applicantId, $newStage, $optionIdValue);
            if ($result) {
                $newStageEntity = $this->stageModel->getStageById($newStage);
                $data = [
                    'success' => true,
                    'message' => 'Successfully updated Applicant to Next Stage with Options',
                    'data' => []
                ];
                $data['data']['newStageName'] = $newStageEntity->getStageTitle();
                $data['data']['stageId'] = $newStage;
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
        }
    }
}
