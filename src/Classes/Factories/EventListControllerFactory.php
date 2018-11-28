<?php
/**
 * Created by PhpStorm.
 * User: academy
 * Date: 28/11/2018
 * Time: 13:58
 */

namespace Portal\Factories;
use Psr\Container\ContainerInterface;
use Portal\Controllers\EventListController;

class EventListControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $eventListModel = $container->get('EventListModel');

        $renderer = $container->get('renderer');
        return new EventListController($renderer, $eventListModel);

    }
}