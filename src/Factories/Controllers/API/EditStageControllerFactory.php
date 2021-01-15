<?php

namespace Portal\Factories\Controllers\API;

use Portal\Controllers\API\EditStageController;
use Psr\Container\ContainerInterface;

class EditStageControllerFactory
{
    /**
     * invoke() method for creating new EditStageControllers from the DIC
     * @param ContainerInterface $container
     * @return EditStageController
     */
    public function __invoke(ContainerInterface $container)
    {
        $model = $container->get('StageModel');
        return new EditStageController($model);
    }
}
