<?php

namespace Portal\Factories;

use Portal\Controllers\FrontEnd\DisplayPastEventsPageController;
use Psr\Container\ContainerInterface;

class DisplayPastEventsPageControllerFactory
{
    /**
     * Retreives EventModel and PhpRenderer from DIC
     * Creates and returns new instance of DisplayEventsPageController
     *
     * @param ContainerInterface $container
     * @return DisplayPastEventsPageController
     */
    public function __invoke(ContainerInterface $container) : DisplayPastEventsPageController
    {
        $eventModel = $container->get('EventModel');
        $renderer = $container->get('renderer');
        return new DisplayPastEventsPageController($renderer, $eventModel);
    }
}
