<?php

namespace Portal\Factories\Controllers\FrontEnd;

use Portal\Controllers\FrontEnd\TrainersPageController;
use Psr\Container\ContainerInterface;

class TrainersPageControllerFactory
{
    /**
     * Retreives TrainerModel and PhpRenderer from DIC
     * Creates and returns new instance of TrainersPageController
     *
     * @param ContainerInterface $container
     * @return TrainersPageController
     */
    public function __invoke(ContainerInterface $container): TrainersPageController
    {
        $renderer = $container->get('renderer');
        $trainerModel = $container->get('TrainerModel');
        return new TrainersPageController($renderer, $trainerModel);
    }
}
