<?php

namespace Portal\Factories\Controllers\API;

use Portal\Controllers\API\CreateHiringPartnerController;
use Psr\Container\ContainerInterface;

class CreateHiringPartnerControllerFactory
{
    /**Controller for adding hiring partners to the database
     *
     * @param ContainerInterface $container
     * @return CreateHiringPartnerController instantiated with both params from the container
     */
    public function __invoke(ContainerInterface $container) : CreateHiringPartnerController
    {

        $hiringPartnerModel = $container->get('HiringPartnerModel');
        return new CreateHiringPartnerController($hiringPartnerModel);
    }
}