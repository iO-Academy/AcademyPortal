<?php

namespace Portal\Factories;

use Portal\Controllers\GetHiringPartnerContactsController;
use Psr\Container\ContainerInterface;

class GetHiringPartnerContactsControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $hiringPartnerContactsModel = $container->get('HiringPartnerContactsModel');
        return new GetHiringPartnerContactsController($hiringPartnerContactsModel);
    }
}