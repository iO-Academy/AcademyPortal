<?php

namespace Portal\Factories;

use Portal\Controllers\AddEventController;
use Psr\Container\ContainerInterface;

class AddEventControllerFactory
{
    /**
     * Returns an instance of AddEventController
     *
     * @param ContainerInterface $container
     * @return AddEventController
     */
    public function __invoke(ContainerInterface $container):AddEventController
    {
        $eventModel = $container->get('EventModel');
        return new AddEventController($eventModel);
    }
}
