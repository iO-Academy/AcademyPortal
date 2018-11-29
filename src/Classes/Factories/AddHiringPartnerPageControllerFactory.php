<?php

namespace Portal\Factories;

use Portal\Controllers\AddHiringPartnerPageController;

class AddHiringPartnerPageControllerFactory
{
    /**
     * @param $container
     * @return AddHiringPartnerPageController
     */
    public function __invoke($container)
    {
        $renderer = $container->renderer;
        $hiringPartnerModel = $container->HiringPartnerModel;
        return new AddHiringPartnerPageController($renderer, $hiringPartnerModel);
    }

}