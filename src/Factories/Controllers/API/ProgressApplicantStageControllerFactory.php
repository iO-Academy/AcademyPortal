<?php

namespace Portal\Factories\Controllers\API;

use Portal\Controllers\API\ProgressApplicantStageController;
use Psr\Container\ContainerInterface;

class ProgressApplicantStageControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $stageModel = $container->get('StageModel');
        $applicantModel = $container->get('ApplicantModel');
        return new ProgressApplicantStageController($applicantModel, $stageModel);
    }
}