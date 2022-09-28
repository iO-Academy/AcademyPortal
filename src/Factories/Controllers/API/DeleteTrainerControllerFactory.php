<?php

namespace Portal\Factories\Controllers\API;

use Portal\Controllers\API\DeleteTrainerController;
use Psr\Container\ContainerInterface;

class DeleteTrainerControllerFactory
{
    /** Invoke method to instantiate DeleteTrainerController object
     * Gets Trainer Model from DIC to pass into returned object.
     *
     * @param ContainerInterface $container
     * @return DeleteTrainerController
     */
    public function __invoke(ContainerInterface $container): DeleteTrainerController
    {
        $model = $container->get('TrainerModel');
        return new DeleteTrainerController($model);
    }
}
