<?php

namespace Portal\Factories;

use Psr\Container\ContainerInterface;
use Portal\Controllers\MakeHiringPartnerContactMainController;

class MakeHiringPartnerContactMainControllerFactory
{
    public function __invoke(ContainerInterface $container) :MakeHiringPartnerContactMainController
    {
        $hiringPartnerContactModel = $container->get('HiringPartnerContactModel');
        return new MakeHiringPartnerContactMainController($hiringPartnerContactModel);
    }
}