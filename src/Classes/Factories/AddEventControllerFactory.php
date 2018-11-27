<?php
/**
 * Created by PhpStorm.
 * User: academy
 * Date: 27/11/2018
 * Time: 16:02
 */

namespace Portal\Factories;

use Portal\Controllers\AddEventController;

class AddEventControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $eventModel = $container->get('EventModel');
        return new AddEventController($eventModel);
    }

}