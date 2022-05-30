<?php

namespace Portal\Factories\Controllers\API;

use Portal\Controllers\API\AddAptitudeScoreController;
use Portal\Controllers\API\EditApplicantStageController;
use Psr\Container\ContainerInterface;

class AddAptitudeScoreControllerFactory
{
    public function __invoke(ContainerInterface $container): AddAptitudeScoreController
    {
        $applicantModel = $container->get('ApplicantModel');
        return new AddAptitudeScoreController($applicantModel);
    }
}
