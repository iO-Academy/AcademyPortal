<?php

namespace Portal\Factories;

use Psr\Container\ContainerInterface;
use Portal\Controllers\AssignMainContactController;

class AssignMainContactControllerFactory
{
    /**
     * Creates controller to assign main contact to hiring partner
     *
     * @param ContainerInterface $container
     *
     * @return AssignMainContactController a new instance of MakeHiringPartnerController
     */
    public function __invoke(ContainerInterface $container) :AssignMainContactController
    {
        $hiringPartnerContactModel = $container->get('HiringPartnerContactModel');
        return new AssignMainContactController($hiringPartnerContactModel);
    }
}