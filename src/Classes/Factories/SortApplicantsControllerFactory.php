<?php

namespace Portal\Factories;

use Portal\Controllers\SortApplicantsController;
use Psr\Container\ContainerInterface;

class SortApplicantsControllerFactory
{
    /**
     * Instantiates DisplayApplicantsController with dependencies.
     *
     * @param ContainerInterface $container
     *
     * @return SortApplicantsController.
     */
    public function __invoke(ContainerInterface $container)
    {
        $renderer = $container->get('renderer');
        $applicantModel = $container->get('ApplicantModel');
        return new SortApplicantsController($renderer, $applicantModel);
    }
}
