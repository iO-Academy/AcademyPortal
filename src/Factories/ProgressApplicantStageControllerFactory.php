<?php


namespace Portal\Factories;


use Portal\Controllers\ProgressApplicantStageController;
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