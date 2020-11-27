<?php

namespace Portal\Factories;

use Portal\Controllers\API\AuthenticateApplicantController;
use Psr\Container\ContainerInterface;

class AuthenticateApplicantControllerFactory
{
    public function __invoke(ContainerInterface $container): AuthenticateApplicantController
    {
        $applicantModel = $container->get('ApplicantModel');
        return new AuthenticateApplicantController($applicantModel);
    }
}
