<?php


namespace Portal\Controllers;

use Portal\Interfaces\ApplicantModelInterface;
use Portal\Models\StageModel;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class ProgressApplicantStageController
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
            $applicantId = (int) $args['id'];
            $currentStage = (int) $this->applicantModel->getApplicantStageId($applicantId)['stageId'];

            $numberOfStages = (int) $this->stageModel->stagesCount()['stagesCount'];

            if ($currentStage < $numberOfStages) {
                $currentStage++;
                $this->applicantModel->updateApplicantStageId($currentStage, $applicantId);
            }

            return $response->withHeader('Location', '/applicants');
        }
    }
}