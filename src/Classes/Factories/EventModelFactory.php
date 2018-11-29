<?php

namespace Portal\Factories;

use Portal\Models\EventModel;

class EventModelFactory
{
    /**
     * @param $container
     * @return EventModel
     */
    public function __invoke($container)
    {
        $db = $container->dbConnection;
        return new EventModel($db);
    }
}