<?php

namespace Portal\Factories;

use Psr\Container\ContainerInterface;
use Portal\Controllers\GetCompanySizeController;

class GetCompanySizeControllerFactory
{

    /**
     * Creates Company Size Controller with dependencies
     *
     * @param ContainerInterface $container DIC
     *
     * @return GetCompanySizeController returns object with dependency on Hiring Partner Model
     */
    public function __invoke(ContainerInterface $container)
    {
        $hiringPartnerModel = $container->get('HiringPartnerModel');
        return new GetCompanySizeController($hiringPartnerModel);
    }
}