<?php


namespace Portal\Controllers;

use Portal\Abstracts\Controller;
use Portal\Interfaces\ApplicantModelInterface;
use Portal\Models\StageModel;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class ProgressApplicantStageController extends Controller
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
            $optionIdValue = $request->getQueryParams()['optionId'];
            $optionId = ($optionIdValue == 'null') ? NULL : (int) $optionIdValue;
            $this->applicantModel->updateApplicantStageAndOptionIds($applicantId, $newStage, $optionId);
            $newStage = $this->stageModel->getStageById($newStage);
            $data = [
                'success' => true,
                'message' => 'Successfully updated applicant stage',
                'data' => []
            ];
            $data['data']['newStageName'] = $newStage->getStageTitle();
            return $this->respondWithJson($response, $data, 200);
        }
    }
}
