<?php

namespace Portal\Factories;

use Psr\Container\ContainerInterface;
use Portal\Controllers\RemoveHiringPartnerFromEventController;

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
