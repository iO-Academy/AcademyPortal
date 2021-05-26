<?php

namespace Portal\Factories\Controllers\FrontEnd;

use Psr\Container\ContainerInterface;
use Portal\Controllers\FrontEnd\ApplicantsPageController;

class ApplicantsPageControllerFactory
{
    /**
     * Instantiates ApplicantsPageController with dependencies.
     *
     * @param ContainerInterface $container
     *
     * @return ApplicantsPageController.
     */
    public function __invoke(ContainerInterface $container): ApplicantsPageController
    {
        $randomPasswordModel = $container->get('RandomPasswordModel');
        $renderer = $container->get('renderer');
        $stageModel = $container->get('StageModel');
        $applicantModel = $container->get('ApplicantModel');
        return new ApplicantsPageController($renderer, $stageModel, $applicantModel, $randomPasswordModel);
    }
}
