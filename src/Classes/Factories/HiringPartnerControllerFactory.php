<?php

namespace Portal\Factories;

use Portal\Controllers\HiringPartnerController;
use Psr\Container\ContainerInterface;

class HiringPartnerControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $renderer = $container->get('renderer');
        $hiringPartnerModel = $container->get('HiringPartnerModel');
        return new HiringPartnerController($renderer, $hiringPartnerModel);
    }
}