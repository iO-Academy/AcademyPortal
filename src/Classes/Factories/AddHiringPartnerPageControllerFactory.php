<?php

namespace Portal\Factories;

use Portal\Controllers\AddHiringPartnerPageController;

class AddHiringPartnerPageControllerFactory
{
    public function __invoke($c)
    {
        $renderer = $c->renderer;
        $hiringPartnerModel = $c->HiringPartnerModel;
        return new AddHiringPartnerPageController($renderer, $hiringPartnerModel);
    }

}