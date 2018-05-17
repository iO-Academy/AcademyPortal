<?php

namespace Portal\Factories;

use Psr\Container\ContainerInterface;
use Portal\Controllers\ApplicationFormController;

class ApplicationFormControllerFactory
{
    /**
     * Creates login controller with dependencies
     *
     * @param ContainerInterface $container DIC
     *
     * @return ApplicationFormController returns object with dependencies injected
     */

    public function __invoke(ContainerInterface $container)
    {
        $applicationFormModel = $container->get('ApplicationFormModel');
        return new ApplicationFormController($applicationFormModel);
    }
}