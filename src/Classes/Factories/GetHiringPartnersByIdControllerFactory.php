<?php

namespace Portal\Factories;

use Portal\Controllers\GetHiringPartnersByIdController;
use Psr\Container\ContainerInterface;

class GetHiringPartnersByIdControllerFactory
{

    /**
     * Invoke function to create new GetHiringPartnersByIdControllers
     *
     * @param ContainerInterface $container
     *
     * @return GetHiringPartnersByIdController
     */
    public function __invoke(ContainerInterface $container): GetHiringPartnersByIdController
    {
        $hiringPartnerModel = $container->get('HiringPartnerModel');
        $eventModel = $container->get('EventModel');
        return new GetHiringPartnersByIdController($hiringPartnerModel, $eventModel);
    }
}
