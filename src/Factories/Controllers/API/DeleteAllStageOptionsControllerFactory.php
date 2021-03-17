<?php

namespace Portal\Factories\Controllers\API;

use Psr\Container\ContainerInterface;
use Portal\Controllers\API\DeleteAllStageOptionsController;

class DeleteAllStageOptionsControllerFactory
{
    /**
     * invoke() method for creating new EditStageOptionControllers from the DIC
     * @param ContainerInterface $container
     * @return DeleteAllStageOptionsController
     */
    public function __invoke(ContainerInterface $container): DeleteAllStageOptionsController
    {
        $model = $container->get('StageModel');
        return new DeleteAllStageOptionsController($model);
    }
}
