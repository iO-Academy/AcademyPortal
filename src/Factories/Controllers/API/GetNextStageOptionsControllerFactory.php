<?php

namespace Portal\Factories\Controllers\API;

use Portal\Controllers\API\GetNextStageOptionsController;
use Psr\Container\ContainerInterface;

class GetNextStageOptionsControllerFactory
{
    /**
     * Creates a controller to get all the events
     *
     * @param ContainerInterface $container
     *
     * @return GetNextStageOptionsController a new instance of the GetNextStageOptionsController
     */
    public function __invoke(ContainerInterface $container)
    {
        $stageModel = $container->get('StageModel');
        return new GetNextStageOptionsController($stageModel);
    }
}
