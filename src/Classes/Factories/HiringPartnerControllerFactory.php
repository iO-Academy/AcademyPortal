<?php

namespace Portal\Factories;

use Portal\Controllers\HiringPartnerController;
use Psr\Container\ContainerInterface;

class HiringPartnerControllerFactory
{
    /**Controller for adding hiring partners to the database
     *
     * @param ContainerInterface $container
     * @return HiringPartnerController instantiated with both params from the container
     */
    public function __invoke(ContainerInterface $container)
    {
        $renderer = $container->get('renderer');
        $hiringPartnerModel = $container->get('HiringPartnerModel');
        return new HiringPartnerController($renderer, $hiringPartnerModel);
    }
}