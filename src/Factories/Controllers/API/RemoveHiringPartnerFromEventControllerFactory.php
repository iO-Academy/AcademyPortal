<?php

namespace Portal\Factories\Controllers\API;

use Psr\Container\ContainerInterface;
use Portal\Controllers\API\RemoveHiringPartnerFromEventController;

class RemoveHiringPartnerFromEventControllerFactory
{
    /**
     * Instantiates RemoveHiringPartnerFromEventController with dependencies.
     *
     * @param ContainerInterface $container
     *
     * @return RemoveHiringPartnerFromEventController
     */
    public function __invoke(ContainerInterface $container) :RemoveHiringPartnerFromEventController
    {
        $eventModel = $container->get('EventModel');
        return new RemoveHiringPartnerFromEventController($eventModel);
    }
}
