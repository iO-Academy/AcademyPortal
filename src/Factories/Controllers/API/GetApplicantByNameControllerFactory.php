<?php

namespace Portal\Factories\Controllers\API;

use Portal\Controllers\API\GetApplicantByNameController;
use Psr\Container\ContainerInterface;

class GetApplicantByNameControllerFactory
{
    /**
     * Instantiates GetApplicantByNameController with dependencies.
     * @param ContainerInterface $container
     * @return GetApplicantByNameController.
     */
    public function __invoke(ContainerInterface $container): GetApplicantByNameController
    {
        $applicantModel = $container->get('ApplicantModel');
        return new GetApplicantByNameController($applicantModel);
    }
}
