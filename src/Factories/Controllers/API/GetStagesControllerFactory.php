<?php

namespace Portal\Factories\Controllers\API;

use Psr\Container\ContainerInterface;
use Portal\Controllers\API\GetStagesController;

class GetStagesControllerFactory
{
    /**
     * Instantiates a new GetStagesController and injects a StageModel
     *
     * @param ContainerInterface $container
     * @return GetStagesController
     */
    public function __invoke(ContainerInterface $container): GetStagesController
    {
        $stageModel = $container->get('StageModel');
        return new GetStagesController($stageModel);
    }
}
