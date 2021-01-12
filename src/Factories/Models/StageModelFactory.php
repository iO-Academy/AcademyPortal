<?php

namespace Portal\Factories\Models;

use Portal\Models\StageModel;
use Psr\Container\ContainerInterface;

class StageModelFactory
{
    /**
     * Creates stage model with dependencies.
     *
     * @param ContainerInterface $container
     *
     * @return StageModel returns object with db connection injected.
     */
    public function __invoke(ContainerInterface $container)
    {
        $db = $container->get('dbConnection');
        return new StageModel($db);
    }
}
