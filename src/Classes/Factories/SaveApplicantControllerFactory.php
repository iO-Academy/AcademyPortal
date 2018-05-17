<?php

namespace Portal\Factories;

use Psr\Container\ContainerInterface;
use Portal\Controllers\SaveApplicantController;

class SaveApplicantControllerFactory
{
    /**
     * Creates SaveApplicantController with dependencies
     *
     * @param $container
     *
     * @return SaveApplicantController returns object with db connection injected
     */
    public function __invoke(ContainerInterface $container): SaveApplicantController
    {
        $applicantModel = $container->get('ApplicantModel');
        return new SaveApplicantController($applicantModel);
    }
}