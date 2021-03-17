<?php

namespace Portal\Factories\Controllers\API;

use Portal\Controllers\API\AddStageOptionController;
use Psr\Container\ContainerInterface;

/**
     * invoke() method for creating new AddStageOptionControllers from the DIC
     * @param ContainerInterface $container
     * @return AddStageOptionController
     */
class AddStageOptionControllerFactory
{
    public function __invoke(ContainerInterface $container): AddStageOptionController
    {
        $model = $container->get('StageModel');
        return new AddStageOptionController($model);
    }
}
