<?php

namespace Portal\Factories;

use Portal\Controllers\API\DisplayEventsPageController;
use Psr\Container\ContainerInterface;

class DisplayEventsPageControllerFactory
{
    /**
     * Retreives EventModel and PhpRenderer from DIC
     * Creates and returns new instance of DisplayEventsPageController
     *
     * @param ContainerInterface $container
     * @return DisplayEventsPageController
     */
    public function __invoke(ContainerInterface $container) : DisplayEventsPageController
    {
        $eventModel = $container->get('EventModel');
        $renderer = $container->get('renderer');
        return new DisplayEventsPageController($renderer, $eventModel);
    }
}
