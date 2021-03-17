<?php

namespace Portal\Factories\Controllers\API;

use Psr\Container\ContainerInterface;
use Portal\Controllers\API\DeleteHiringPartnerFromEventController;

class DeleteHiringPartnerFromEventControllerFactory
{
    /**
     * Instantiates DeleteHiringPartnerFromEventController with dependencies.
     *
     * @param ContainerInterface $container
     *
     * @return DeleteHiringPartnerFromEventController
     */
    public function __invoke(ContainerInterface $container): DeleteHiringPartnerFromEventController
    {
        $eventModel = $container->get('EventModel');
        return new DeleteHiringPartnerFromEventController($eventModel);
    }
}
