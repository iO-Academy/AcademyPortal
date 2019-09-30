<?php

namespace Portal\Factories;

use Portal\Controllers\DisplayEventsPageController;
use Psr\Container\ContainerInterface;

class DisplayEventsPageControllerFactory
{
    public function __invoke(ContainerInterface $container) :DisplayEventsPageController
    {
        $eventsModel = $container->get('EventModel');
        $renderer = $container->get('renderer');
        return new DisplayEventsPageController($renderer, $eventsModel);
    }
}