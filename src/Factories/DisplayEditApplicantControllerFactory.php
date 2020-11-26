<?php


namespace Portal\Factories;

use Portal\Controllers\FrontEnd\DisplayEditApplicantController;
use Psr\Container\ContainerInterface;

class DisplayEditApplicantControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $renderer = $container->get('renderer');
        $applicantModel = $container->get('ApplicantModel');
        $applicantFormModel = $container->get('ApplicationFormModel');
        $stageModel = $container->get('StageModel');
        $editApplicantController = new DisplayEditApplicantController($applicantModel, $applicantFormModel, $stageModel, $renderer);
        return $editApplicantController;
    }
}
