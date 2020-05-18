<?php

namespace Portal\Factories;

class AddStageOptionControllerFactory
{
    public function __invoke(ContainerInterface $container):AddStageOptionController
    {
        $model = $container->get('StageModel');
        return new DeleteStageOptionController($model);
    }
}

