<?php


namespace Portal\Factories;


use Portal\Models\CohortModel;
use Psr\Container\ContainerInterface;

class CohortModelFactory
{
    /**
     * Creates user model with dependencies.
     *
     * @param ContainerInterface $container
     *
     * @return CohortModel returns object with db connection injected.
     */
    public function __invoke(ContainerInterface $container)
    {
        $db = $container->get('dbConnection');
        return new CohortModel($db);
    }
}