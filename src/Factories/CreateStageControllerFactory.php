<?php

namespace Portal\Factories;

use Psr\Container\ContainerInterface;
use Portal\Controllers\CreateStageController;

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