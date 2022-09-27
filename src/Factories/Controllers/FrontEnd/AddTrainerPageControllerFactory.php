<?php

namespace Portal\Factories\Controllers\FrontEnd;

use Portal\Controllers\FrontEnd\AddTrainerPageController;
use Psr\Container\ContainerInterface;

class AddTrainerPageControllerFactory
{
    /**
     * Retreives TrainerModel and PhpRenderer from DIC
     * Creates and returns new instance of AddTrainerPageController
     *
     * @param ContainerInterface $container
     * @return AddTrainerPageController
     */
    public function __invoke(ContainerInterface $container): AddTrainerPageController
    {
        $renderer = $container->get('renderer');
        $trainerModel = $container->get('TrainerModel');
        return new AddTrainerPageController($renderer, $trainerModel);
    }
}
