<?php

namespace Portal\Factories;

use Psr\Container\ContainerInterface;
use Portal\Controller\SaveApplicantController;

class SaveApplicantControllerFactory
{
    public function __invoke(ContainerInterface $container): SaveApplicantController
    {
        $applicantModel = $container->get('ApplicantModel');
        return new SaveApplicantController($applicantModel);
    }
}