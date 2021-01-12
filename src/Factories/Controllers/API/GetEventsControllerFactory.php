<?php

namespace Portal\Factories\Controllers\API;

use Portal\Controllers\API\GetEventsController;
use Psr\Container\ContainerInterface;

class GetEventsControllerFactory
{
    /**
     * Creates a controller to get all the events
     *
     * @param ContainerInterface $container
     *
     * @return GetEventsController a new instance of the GetEventsController
     */
    public function __invoke(ContainerInterface $container)
    {
        $eventModel = $container->get('EventModel');
        return new GetEventsController($eventModel);
    }
}
