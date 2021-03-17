<?php

namespace Portal\Factories\Controllers\FrontEnd;

use Portal\Controllers\FrontEnd\EventsPageController;
use Psr\Container\ContainerInterface;

class EventsPageControllerFactory
{
    /**
     * Retreives EventModel and PhpRenderer from DIC
     * Creates and returns new instance of EventsPageController
     *
     * @param ContainerInterface $container
     * @return EventsPageController
     */
    public function __invoke(ContainerInterface $container): EventsPageController
    {
        $eventModel = $container->get('EventModel');
        $renderer = $container->get('renderer');
        return new EventsPageController($renderer, $eventModel);
    }
}
