<?php

namespace Portal\Factories\Controllers\FrontEnd;

use Psr\Container\ContainerInterface;
use Portal\Controllers\FrontEnd\HiringPartnerPageController;

class HiringPartnerPageControllerFactory
{
    /**
     * Instantiates HiringPartnerPageController with dependencies.
     *
     * @param ContainerInterface $container
     *
     * @return HiringPartnerPageController
     */

    public function __invoke(ContainerInterface $container): HiringPartnerPageController
    {
        $renderer = $container->get('renderer');
        $hiringPartnerModel = $container->get('HiringPartnerModel');
        return new HiringPartnerPageController($renderer, $hiringPartnerModel);
    }
}
