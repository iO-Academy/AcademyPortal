<?php

namespace Portal\Factories;

use Psr\Container\ContainerInterface;
use Portal\Controllers\LinkHiringPartnerToEventController;

class LinkHiringPartnerToEventControllerFactory
{
    /**
     * Instantiates LinkHiringPartnerToEventController with dependencies.
     *
     * @param ContainerInterface $container
     *
     * @return LinkHiringPartnerToEventController
     */
    public function __invoke(ContainerInterface $container) : LinkHiringPartnerToEventController
    {
        $eventModel = $container->get('EventModel');
        return new LinkHiringPartnerToEventController ($eventModel);
    }
}
