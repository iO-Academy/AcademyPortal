<?php

namespace Portal\Factories;

use Psr\Container\ContainerInterface;
use Portal\Controllers\GetCompanySizeController;

class GetCompanySizeControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $hiringPartnerModel = $container->get('HiringPartnerModel');
        return new GetCompanySizeController($hiringPartnerModel);
    }
}