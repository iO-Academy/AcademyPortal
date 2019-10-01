<?php

namespace Portal\Factories;

use Portal\Controllers\GetEventController;
use Psr\Container\ContainerInterface;

class GetEventControllerFactory
{
    /**
     * Creates a controller to get all the events
     *
     * @param ContainerInterface $container
     *
     * @return GetEventController a new instance of the GetEventController
     */
    public function __invoke(ContainerInterface $container)
    {
        $eventModel = $container->get('EventModel');
        return new GetEventController($eventModel);
    }
}
