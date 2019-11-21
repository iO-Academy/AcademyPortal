<?php

namespace Portal\Factories;

use Psr\Container\ContainerInterface;
use Portal\Controllers\AddHiringPartnerToEventController;

class AddHiringPartnerToEventControllerFactory
{
    /**
     * Instantiates AddHiringPartnerToEventController with dependencies.
     *
     * @param ContainerInterface $container
     *
     * @return AddHiringPartnerToEventController
     */
    public function __invoke(ContainerInterface $container) : AddHiringPartnerToEventController
    {
        $eventModel = $container->get('EventModel');
        return new AddHiringPartnerToEventController($eventModel);
    }
}
