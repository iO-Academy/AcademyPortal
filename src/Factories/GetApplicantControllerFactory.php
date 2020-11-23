<?php

namespace Portal\Factories;

use Portal\Controllers\API\GetApplicantController;
use Portal\Controllers\API\DisplayApplicantsController;
use Psr\Container\ContainerInterface;

class GetApplicantControllerFactory
{
    /**
     * Instantiates GetApplicantController with dependencies.
     *
     * @param ContainerInterface $container
     *
     * @return DisplayApplicantsController.
     */
    public function __invoke(ContainerInterface $container): GetApplicantController
    {
        $applicantModel = $container->get('ApplicantModel');
        return new GetApplicantController($applicantModel);
    }
}
