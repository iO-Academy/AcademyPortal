<?php

namespace Portal\Factories;

use Portal\Controllers\AddHiringPartnerController;
use Psr\Container\ContainerInterface;


class AddHiringPartnerControllerFactory
{
    /**
     * Creates AddHiringPartnerController with dependencies
     *
     * @param ContainerInterface $container
     * @return AddHiringPartnerController returns object with db connection injected
     */
    public function __invoke(ContainerInterface $container) : AddHiringPartnerController
    {
        $hiringPartnerModel = $container->get('HiringPartnerModel');
        return new AddHiringPartnerController($hiringPartnerModel);
    }

}