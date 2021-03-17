<?php

namespace Portal\Factories\Controllers\API;

use Portal\Controllers\API\GetHiringPartnersController;
use Psr\Container\ContainerInterface;

class GetHiringPartnerControllerFactory
{
    /**
     * Creates a controller to get all the hiring partners
     *
     * @param ContainerInterface $container
     *
     * @return GetHiringPartnerController a new instance of the GetHiringPartnerController
     */
    public function __invoke(ContainerInterface $container): GetHiringPartnersController
    {
        $hiringPartnerModel = $container->get('HiringPartnerModel');
        return new GetHiringPartnersController($hiringPartnerModel);
    }
}
