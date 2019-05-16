<?php

namespace Portal\Factories;

use Portal\Controllers\CreateHiringPartnerContactController;
use Psr\Container\ContainerInterface;

class CreateHiringPartnerContactControllerFactory
{
    /** Calls addHiringPartnerContact method
     *
     * @param $container
     *
     * @return CreateHiringPartnerContactController returns an instantiated CreateHiringPartnerContactController
     */
    public function __invoke(ContainerInterface $container) :CreateHiringPartnerContactController
    {
        $hiringPartnerContactController = $container->get('HiringPartnerContactModel');
        return new CreateHiringPartnerContactController($hiringPartnerContactController);
    }
}