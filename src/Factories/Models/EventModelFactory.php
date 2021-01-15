<?php

namespace Portal\Factories\Models;

use Portal\Models\EventModel;
use Psr\Container\ContainerInterface;

class EventModelFactory
{
    /**
     * Factory to generate an EventModel
     *
     * @param ContainerInterface $container
     *
     * @return EventModel
     */
    public function __invoke(ContainerInterface $container): EventModel
    {
        $db = $container->get('dbConnection');
        return new EventModel($db);
    }
}
