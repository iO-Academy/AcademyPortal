<?php

namespace Portal\Factories\Controllers\API;

use Portal\Controllers\API\DeleteStageController;
use Psr\Container\ContainerInterface;

class DeleteStageControllerFactory
{
    /** Invoke method to instantiate DeleteStageController object
     * Gets StageModel from DIC to pass into returned object.
     *
     * @param ContainerInterface $container
     * @return DeleteStageController
     */
    public function __invoke(ContainerInterface $container): DeleteStageController
    {
        $model = $container->get('StageModel');
        return new DeleteStageController($model);
    }
}
