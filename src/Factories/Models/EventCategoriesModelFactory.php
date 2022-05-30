<?php

namespace Portal\Factories\Models;

use Portal\Models\EventCategoriesModel;
use Psr\Container\ContainerInterface;

class EventCategoriesModelFactory
{
    public function __invoke(ContainerInterface $c): EventCategoriesModel
    {
        $db = $c->get('dbConnection');
        return new EventCategoriesModel($db);
    }
}
