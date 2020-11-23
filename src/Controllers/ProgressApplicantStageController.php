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

        $stages = $this->stageModel->getAllStages();
        var_dump($stages[1]);
        return $response->withHeader('Location', '/');
    }


}