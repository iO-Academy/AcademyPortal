<?php

namespace Portal\Factories\Controllers\API;

use Portal\Controllers\API\EditStageOptionController;
use Psr\Container\ContainerInterface;

class EditStageOptionControllerFactory
{
    /**
     * invoke() method for creating new EditStageOptionControllers from the DIC
     * @param ContainerInterface $container
     * @return EditStageController
     */
    public function __invoke(ContainerInterface $container): EditStageOptionController
    {
        $model = $container->get('StageModel');
        return new EditStageOptionController($model);
    }
}
