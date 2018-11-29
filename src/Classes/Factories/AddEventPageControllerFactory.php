<?php

namespace Portal\Factories;

use Portal\Controllers\AddEventPageController;

class AddEventPageControllerFactory
{
    /**
     * @param $c
     * @return AddEventPageController
     */
    public function __invoke($c)
    {
        $renderer = $c->renderer;
        $eventModel = $c->EventModel;
        return new AddEventPageController($renderer, $eventModel);
    }
}