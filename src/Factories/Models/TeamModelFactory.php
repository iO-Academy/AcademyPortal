<?php

namespace Portal\Factories\Models;

use Psr\Container\ContainerInterface;
use Portal\Models\TeamModel;

class TeamModelFactory
{
    /**
     * Creates applicant model with dependencies.
     *
     * @param ContainerInterface $container
     *
     * @return TeamModel returns object with db connection injected.
     */
    public function __invoke(ContainerInterface $container)
    {
        $db = $container->get('dbConnection');
        return new TeamModel($db);
    }
}
