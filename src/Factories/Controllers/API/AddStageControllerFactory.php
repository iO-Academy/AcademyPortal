<?php

namespace Portal\Factories\Controllers\API;

use Psr\Container\ContainerInterface;
use Portal\Controllers\API\AddStageController;

class AddStageControllerFactory
{
    /**
     * Instantiates a new AddStageController and injects a StageModel
     *
     * @param ContainerInterface $container
     * @return AddStageController
     */
    public function __invoke(ContainerInterface $container): AddStageController
    {
        $stageModel = $container->get('StageModel');
        return new AddStageController($stageModel);
    }
}
