<?php

namespace Portal\Factories\Controllers\API;

use Psr\Container\ContainerInterface;
use Portal\Controllers\API\CreateStageController;

class CreateStageControllerFactory
{
    /**
     * Instantiates a new CreateStageController and injects a StageModel
     *
     * @param ContainerInterface $container
     * @return CreateStageController
     */
    public function __invoke(ContainerInterface $container) : CreateStageController
    {
        $stageModel = $container->get('StageModel');
        return new CreateStageController($stageModel);
    }
}
