<?php

namespace Portal\Factories\Controllers\FrontEnd;

use Portal\Controllers\FrontEnd\TrainersPageController;
use Psr\Container\ContainerInterface;

class TrainersPageControllerFactory
{
    /**
     * Creates and returns new instance of TrainersPageController
     *
     * @param ContainerInterface $container
     * @return TrainersPageController
     */
    public function __invoke(ContainerInterface $container): TrainersPageController
    {
        $renderer = $container->get('renderer');
        return new TrainersPageController($renderer);
    }
}
