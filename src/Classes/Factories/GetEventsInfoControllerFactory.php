<?php


namespace Portal\Factories;


use Portal\Controllers\GetEventsInfoController;
use Psr\Container\ContainerInterface;

class GetEventsInfoControllerFactory
{
    public function __invoke(ContainerInterface $container)
{
    $eventsModel = $container->get('EventsModel');
    return new GetEventsInfoController($eventsModel);
}
}