<?php
/**
 * Created by PhpStorm.
 * User: academy
 * Date: 27/11/2018
 * Time: 10:18
 */

namespace Portal\Factories;

use Interop\Container\ContainerInterface;
use Portal\Models\EventModel;

class EventModelFactory
{
    /**
     * Creates EventModel with dependencies
     *
     * @param ContainerInterface $container
     *
     * @return EventModel
     */
    public function __invoke(ContainerInterface $container) : EventModel
    {
        $db = $container->get('dbConnection');
        return new EventModel($db);
    }

}