<?php

namespace Portal\Factories\Controllers\API;

use Portal\Controllers\API\GetStudentsController;
use Psr\Container\ContainerInterface;

class GetStudentsControllerFactory
{
    /**
     * Instantiates GetApplicantController with dependencies.
     *
     * @param ContainerInterface $container
     *
     * @return GetStudentsController.
     */
    public function __invoke(ContainerInterface $container): GetStudentsController
    {
        $applicantModel = $container->get('ApplicantModel');
        return new GetStudentsController($applicantModel);
    }
}
