<?php

namespace Portal\Factories\Controllers\API;

use Psr\Container\ContainerInterface;
use Portal\Controllers\API\StudentPasswordController;

class StudentPasswordControllerFactory
{
    public function __invoke(ContainerInterface $container): StudentPasswordController
    {
        $password = $container->get('RandomPasswordModel');
        $applicantModel = $container->get('ApplicantModel');
        return new StudentPasswordController($password, $applicantModel);
    }
}
