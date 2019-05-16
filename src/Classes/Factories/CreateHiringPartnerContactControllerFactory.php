<?php

namespace Portal\Factories;

use Psr\Container\ContainerInterface;
use Portal\Controllers\CreateHiringPartnerController;

class CreateHiringPartnerContactControllerFactory
{
    /** Calls addHiringPartnerContact method
     *
     * @param $container
     *
     * @return CreateHiringPartnerContactController returns an instantiated CreateHiringPartnerContactController
     */
    public function __invoke(ContainerInterface $container) : CreateHiringPartnerController
    {
        $hiringPartnerContactsModel = $container->get('HiringPartnerContactModel');
        return new CreateHiringPartnerContactController($hiringPartnerContactsModel);
    }
}