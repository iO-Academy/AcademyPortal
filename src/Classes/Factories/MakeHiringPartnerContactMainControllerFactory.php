<?php

namespace Portal\Factories;

use Psr\Container\ContainerInterface;
use Portal\Controllers\MakeHiringPartnerContactMainController;

class MakeHiringPartnerContactMainControllerFactory
{
    /**
     * Creates controller to assign main contact to hiring partner
     *
     * @param ContainerInterface $container
     *
     * @return MakeHiringPartnerContactMainController a new instance of MakeHiringPartnerController
     */
    public function __invoke(ContainerInterface $container) :MakeHiringPartnerContactMainController
    {
        $hiringPartnerContactModel = $container->get('HiringPartnerContactModel');
        return new MakeHiringPartnerContactMainController($hiringPartnerContactModel);
    }
}