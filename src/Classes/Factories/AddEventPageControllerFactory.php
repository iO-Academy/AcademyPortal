<?php

namespace Portal\Factories;

use Portal\Controllers\AddEventPageController;

class AddEventPageControllerFactory
{
    /**
     * @param $container
     * @return AddEventPageController
     */
    public function __invoke($container)
    {
        $renderer = $container->renderer;
        $eventModel = $container->EventModel;
        return new AddEventPageController($renderer, $eventModel);
    }
}