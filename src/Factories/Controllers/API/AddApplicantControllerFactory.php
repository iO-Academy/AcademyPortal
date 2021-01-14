<?php

namespace Portal\Factories\Controllers\API;

use Psr\Container\ContainerInterface;
use Portal\Controllers\API\AddApplicantController;

class AddApplicantControllerFactory
{
    /**
     * Creates AddApplicantPageController with dependencies.
     *
     * @param ContainerInterface $container
     *
     * @return AddApplicantController returns object with db connection injected.
     */
    public function __invoke(ContainerInterface $container): AddApplicantController
    {
        $applicantModel = $container->get('ApplicantModel');
        return new AddApplicantController($applicantModel);
    }
}
