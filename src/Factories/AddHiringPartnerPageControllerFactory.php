<?php

namespace Portal\Factories;

use Psr\Container\ContainerInterface;
use Portal\Controllers\FrontEnd\AddHiringPartnerPageController;

class AddHiringPartnerPageControllerFactory
{
    /**
     * Instantiates DisplayHiringPartnerPageController with dependencies.
     *
     * @param ContainerInterface $container
     *
     * @return AddHiringPartnerPageController
     */

    public function __invoke(ContainerInterface $container) : AddHiringPartnerPageController
    {
        $renderer = $container->get('renderer');
        $hiringPartnerModel = $container->get('HiringPartnerModel');
        return new AddHiringPartnerPageController($renderer, $hiringPartnerModel);
    }
}
