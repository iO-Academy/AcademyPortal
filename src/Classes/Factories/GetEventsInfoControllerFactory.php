<?php

namespace Portal\Factories;

use Portal\Controllers\GetEventsInfoController;
use Psr\Container\ContainerInterface;

class GetEventsInfoControllerFactory
{
    /**
     * Creates a controller to get all the events
     *
     * @param ContainerInterface $container
     *
     * @return GetEventsInfoController a new instance of the GetEventsInfoController
     */
    public function __invoke(ContainerInterface $container)
    {
        $eventsModel = $container->get('EventsModel');
        return new GetEventsInfoController($eventsModel);
    }
}
