<?php

namespace Portal\Factories\Controllers\API;

use Portal\Controllers\API\EditApplicantController;
use Psr\Container\ContainerInterface;

class EditApplicantControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $applicantModel = $container->get('ApplicantModel');
        $editApplicantController = new EditApplicantController($applicantModel);
        return $editApplicantController;
    }
}
