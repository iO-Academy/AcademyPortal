<?php

namespace Portal\Factories\Controllers\API;

use Psr\Container\ContainerInterface;
use Portal\Controllers\API\GetApplicationFormController;

class GetApplicationFormControllerFactory
{
    /**
     * Creates login controller with dependencies.
     *
     * @param ContainerInterface $container DIC
     *
     * @return GetApplicationFormController returns object with dependencies injected.
     */

    public function __invoke(ContainerInterface $container)
    {
        $applicationFormModel = $container->get('ApplicationFormModel');
        $eventModel = $container->get('EventModel');
        return new GetApplicationFormController($applicationFormModel, $eventModel);
    }
}
