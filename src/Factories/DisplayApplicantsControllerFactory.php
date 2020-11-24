<?php

namespace Portal\Factories;

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
        $applicantModel = $container->get('ApplicantModel');
        return new DisplayApplicantsController($renderer, $applicantModel);
    }
}
