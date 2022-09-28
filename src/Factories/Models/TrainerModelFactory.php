<?php

namespace Portal\Factories\Models;

use Psr\Container\ContainerInterface;
use Portal\Models\TrainerModel;

class TrainerModelFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $db = $container->get('dbConnection');
        return new TrainerModel($db);
    }
}
