<?php

namespace Portal\Factories;

use Portal\Controllers\DisplayEventsPageController;
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
        $eventsModel = $container->get('EventModel');
        $renderer = $container->get('renderer');
        return new DisplayEventsPageController($renderer, $eventsModel);
    }
}
