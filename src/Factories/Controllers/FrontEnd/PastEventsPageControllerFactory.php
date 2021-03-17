<?php

namespace Portal\Factories\Controllers\FrontEnd;

use Portal\Controllers\FrontEnd\PastEventsPageController;
use Psr\Container\ContainerInterface;

class PastEventsPageControllerFactory
{
    /**
     * Retreives EventModel and PhpRenderer from DIC
     * Creates and returns new instance of EventsPageController
     *
     * @param ContainerInterface $container
     * @return PastEventsPageController
     */
    public function __invoke(ContainerInterface $container): PastEventsPageController
    {
        $eventModel = $container->get('EventModel');
        $renderer = $container->get('renderer');
        return new PastEventsPageController($renderer, $eventModel);
    }
}
