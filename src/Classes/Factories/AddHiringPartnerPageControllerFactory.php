<?php

namespace Portal\Factories;

use Portal\Controllers\AddHiringPartnerPageController;

class AddHiringPartnerPageControllerFactory
{
    /**
     * @param $c
     * @return AddHiringPartnerPageController
     */
    public function __invoke($c)
    {
        $renderer = $c->renderer;
        $hiringPartnerModel = $c->HiringPartnerModel;
        return new AddHiringPartnerPageController($renderer, $hiringPartnerModel);
    }

}