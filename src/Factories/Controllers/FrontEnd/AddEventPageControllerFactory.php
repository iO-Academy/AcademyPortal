<?php

namespace Portal\Factories\Controllers\FrontEnd;

use Portal\Controllers\FrontEnd\AddEventPageController;
use Psr\Container\ContainerInterface;

class AddEventPageControllerFactory
{
    /**
     * Retreives EventModel and PhpRenderer from DIC
     * Creates and returns new instance of EventsPageController
     *
     * @param ContainerInterface $container
     * @return AddEventPageController
     */
    public function __invoke(ContainerInterface $container): AddEventPageController
    {
        $eventModel = $container->get('EventModel');
        $renderer = $container->get('renderer');
        return new AddEventPageController($renderer, $eventModel);
    }
}
