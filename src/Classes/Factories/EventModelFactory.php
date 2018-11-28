<?php

namespace Portal\Factories;

use Portal\Models\EventModel;

class EventModelFactory
{
    public function __invoke($c)
    {
        $db = $c->dbConnection;
        return new EventModel($db);
    }
}