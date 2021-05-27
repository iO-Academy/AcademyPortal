<?php

namespace Portal\Factories\Controllers\API;

use Psr\Container\ContainerInterface;
use Portal\Controllers\API\StudentPasswordModalController;

class StudentPasswordModalControllerFactory
{
    public function __invoke(ContainerInterface $container): StudentPasswordModalController
    {
        $password = $container->get('RandomPasswordModel');
        $applicantModel = $container->get('ApplicantModel');
        return new StudentPasswordModalController($password, $applicantModel);
    }
}
