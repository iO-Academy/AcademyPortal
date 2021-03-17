<?php

namespace Portal\Factories\Controllers\API;

use Portal\Controllers\API\AddHiringPartnerController;
use Psr\Container\ContainerInterface;

class AddHiringPartnerControllerFactory
{
    /**Controller for adding hiring partners to the database
     *
     * @param ContainerInterface $container
     * @return AddHiringPartnerController instantiated with both params from the container
     */
    public function __invoke(ContainerInterface $container): AddHiringPartnerController
    {

        $hiringPartnerModel = $container->get('HiringPartnerModel');
        return new AddHiringPartnerController($hiringPartnerModel);
    }
}
