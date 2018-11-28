<?php

namespace Portal\Factories;

use Portal\Controllers\AddEventController;
use Interop\Container\ContainerInterface;

class AddEventControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $eventModel = $container->get('EventModel');
        return new AddEventController($eventModel);
    }

}