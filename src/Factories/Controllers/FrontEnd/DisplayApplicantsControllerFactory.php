<?php

namespace Portal\Factories\Controllers\FrontEnd;

use Psr\Container\ContainerInterface;
use Portal\Controllers\FrontEnd\DisplayApplicantsController;

class DisplayApplicantsControllerFactory
{
    /**
     * Instantiates DisplayApplicantsController with dependencies.
     *
     * @param ContainerInterface $container
     *
     * @return DisplayApplicantsController.
     */
    public function __invoke(ContainerInterface $container) : DisplayApplicantsController
    {
        $renderer = $container->get('renderer');
        $stageModel = $container->get('StageModel');
        $applicantModel = $container->get('ApplicantModel');
        return new DisplayApplicantsController($renderer, $stageModel, $applicantModel);
    }
}
