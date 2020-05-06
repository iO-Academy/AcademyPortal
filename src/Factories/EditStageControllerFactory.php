<?php

namespace Portal\Factories;

use \Portal\Controllers\EditStageController;
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
