<?php

namespace Portal\Factories;

use Psr\Container\ContainerInterface;
use Portal\Controllers\FrontEnd\DisplayHiringPartnerPageController;

class DisplayHiringPartnerPageControllerFactory
{
    /**
     * Instantiates DisplayHiringPartnerPageController with dependencies.
     *
     * @param ContainerInterface $container
     *
     * @return DisplayHiringPartnerPageController
     */

    public function __invoke(ContainerInterface $container) : DisplayHiringPartnerPageController
    {
        $renderer = $container->get('renderer');
        $hiringPartnerModel = $container->get('HiringPartnerModel');
        return new DisplayHiringPartnerPageController($renderer, $hiringPartnerModel);
    }
}
