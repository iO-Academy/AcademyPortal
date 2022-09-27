<?php

namespace Portal\Factories\Controllers\API;

use Portal\Controllers\API\SubmitAptitudeScoreController;
use Psr\Container\ContainerInterface;

class SubmitAptitudeScoreControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $model = $container->get('ApplicantModel');
        return new SubmitAptitudeScoreController($model);
    }
}