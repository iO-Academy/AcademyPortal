<?php

namespace Portal\Factories\Controllers\API;

use Psr\Container\ContainerInterface;
use Portal\Controllers\API\AddHiringPartnerToEventController;

class AddHiringPartnerToEventControllerFactory
{
    /**
     * Instantiates AddHiringPartnerToEventController with dependencies.
     *
     * @param ContainerInterface $container
     *
     * @return AddHiringPartnerToEventController
     */
    public function __invoke(ContainerInterface $container): AddHiringPartnerToEventController
    {
        $eventModel = $container->get('EventModel');
        return new AddHiringPartnerToEventController($eventModel);
    }
}
