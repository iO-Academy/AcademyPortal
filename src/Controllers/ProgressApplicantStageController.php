<?php


namespace Portal\Controllers;


use Portal\Interfaces\ApplicantModelInterface;
use Portal\Models\StageModel;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\PhpRenderer;

class ProgressApplicantStageController
{
    private $applicantModel;
    private $stageModel;

    public function __construct(ApplicantModelInterface $applicantModel,StageModel $stageModel)
    {
        $this->applicantModel = $applicantModel;
        $this->stageModel = $stageModel;
    }

    public function __invoke(Request $request, Response $response, array $args)
    {
        $currentStage = $this->applicantModel->getApplicantStageId(6);

        $numberOfStages = $this->stageModel->stagesCount();

        if ($currentStage < $numberOfStages) {
            $currentStage++;
            $this->applicantModel->updateApplicantStageId($currentStage, $applicantId);
        }

        return $response->withHeader('Location', '/');

    }



}