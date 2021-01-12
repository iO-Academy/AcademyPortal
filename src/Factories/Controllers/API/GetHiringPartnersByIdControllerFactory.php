<?php

namespace Portal\Factories\Controllers\API;

use Portal\Controllers\API\GetHiringPartnersByIdController;
use Psr\Container\ContainerInterface;

class GetHiringPartnersByIdControllerFactory
{

    /**
     * Invoke function to create new GetHiringPartnersByIdControllers
     *
     * @param ContainerInterface $container an array of objects
     *
     * @return a new GetHiringPartnersByIdController object
     */
    public function __invoke(ContainerInterface $container): GetHiringPartnersByIdController
    {
        $hiringPartnerModel = $container->get('HiringPartnerModel');
        $eventModel = $container->get('EventModel');
        return new GetHiringPartnersByIdController($hiringPartnerModel, $eventModel);
    }
}
