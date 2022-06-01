<?php

namespace Portal\Factories\Controllers\API;

use Portal\Controllers\API\GetEventCategoriesController;
use Psr\Container\ContainerInterface;

class GetEventCategoriesControllerFactory
{
    public function __invoke(ContainerInterface $c): GetEventCategoriesController
    {
        $eventCategoriesModel = $c->get('EventCategoriesModel');
        return new GetEventCategoriesController($eventCategoriesModel);
    }
}
