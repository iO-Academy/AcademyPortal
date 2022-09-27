<?php

namespace Portal\Factories\Controllers\API;

use Portal\Controllers\API\AddTrainerController;
use Psr\Container\ContainerInterface;

class AddTrainerControllerFactory
{
    /**
     * Returns an instance of AddTrainerController
     *
     * @param ContainerInterface $container
     * @return AddTrainerController
     */
    public function __invoke(ContainerInterface $container): AddTrainerController
    {
        $trainerModel = $container->get('TrainerModel');
        return new AddTrainerController($trainerModel);
    }
}
