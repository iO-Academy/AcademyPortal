<?php

namespace Portal\Factories;
use Portal\Models\EventListModel;
use Psr\Container\ContainerInterface;

class EventListModelFactory
{
    public function __invoke(ContainerInterface $container):EventListModel
    {
        $db = $container->get('dbConnection');
        return new EventListModel($db);
    }
}