<?php

namespace Portal\Factories\Controllers\FrontEnd;

use Psr\Container\ContainerInterface;
use Portal\Controllers\FrontEnd\StagesPageController;

class StagesPageControllerFactory
{
    /**
     * Instantiates StagesPageController with dependencies.
     *
     * @param ContainerInterface $container
     *
     * @return StagesPageController.
     */
    public function __invoke(ContainerInterface $container): StagesPageController
    {
        $renderer = $container->get('renderer');
        $stageModel = $container->get('StageModel');
        return new StagesPageController($renderer, $stageModel);
    }
}
