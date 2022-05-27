<?php

namespace Portal\Factories\Controllers\API;

use Portal\Controllers\API\AddAptitudeScoresController;
use Portal\Controllers\API\EditApplicantStageController;
use Psr\Container\ContainerInterface;

class AddAptitudeScoresControllerFactory
{
    public function __invoke(ContainerInterface $container): AddAptitudeScoresController
    {
        $applicantModel = $container->get('ApplicantModel');
        return new AddAptitudeScoresController($applicantModel);
    }
}