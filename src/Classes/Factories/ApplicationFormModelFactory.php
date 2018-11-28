<?php

namespace Portal\Factories;

use Portal\Models\ApplicationFormModel;
use Psr\Container\ContainerInterface;

class ApplicationFormModelFactory
{
    /**
     * Creates user model with dependencies
     *
     * @param ContainerInterface $container
     *
     * @return ApplicationFormModel returns object with db connection injected
     */
    public function __invoke(ContainerInterface $container)
    {
        $db = $container->get('dbConnection');
        return new ApplicationFormModel($db);
    }
}
