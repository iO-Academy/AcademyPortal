<?php

namespace Portal\Factories\Controllers\API;

use Portal\Controllers\API\EditApplicantStageController;
use Psr\Container\ContainerInterface;

class EditApplicantStageControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $stageModel = $container->get('StageModel');
        $applicantModel = $container->get('ApplicantModel');
        return new EditApplicantStageController($applicantModel, $stageModel);
    }
}
