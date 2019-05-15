<?php

namespace Portal\Factories;

use Portal\Controllers\CreateHiringPartnerController;
use Psr\Container\ContainerInterface;

class CreateHiringPartnerControllerFactory
{
    /**Factory for controller that adds hiring partners to the database
     *
     * @param ContainerInterface $container
     * @return CreateHiringPartnerController instantiated with both params from the container
     */
    public function __invoke(ContainerInterface $container)
    {
        $renderer = $container->get('renderer');
        $hiringPartnerModel = $container->get('CreateHiringPartnerModel');
        return new CreateHiringPartnerController($renderer, $hiringPartnerModel);
    }
}