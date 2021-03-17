<?php

namespace Portal\Factories\Controllers\FrontEnd;

use Portal\Controllers\FrontEnd\EditApplicantPageController;
use Psr\Container\ContainerInterface;

class EditApplicantPageControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $renderer = $container->get('renderer');
        $applicantModel = $container->get('ApplicantModel');
        $stageModel = $container->get('StageModel');
        $editApplicantController = new EditApplicantPageController($applicantModel, $stageModel, $renderer);
        return $editApplicantController;
    }
}
