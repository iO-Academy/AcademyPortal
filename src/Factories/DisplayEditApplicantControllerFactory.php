<?php


namespace Portal\Factories;

use Portal\Controllers\DisplayEditApplicantController;
use Psr\Container\ContainerInterface;

class DisplayEditApplicantControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $renderer = $container->get('renderer');
        $applicantModel = $container->get('ApplicantModel');
        $stageModel = $container->get('StageModel');
        $editApplicantController = new DisplayEditApplicantController($applicantModel, $stageModel, $renderer);
        return $editApplicantController;
    }
}
