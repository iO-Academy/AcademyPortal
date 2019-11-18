<?php


namespace Portal\Factories;


use Portal\Controllers\GetHiringPartnerContactController;

class GetHiringPartnerContactControllerFactory
{
    public function __invoke($container)
    {
        $view = $container['render'];
        $model = $container['HiringPartnerModel'];

        return new GetHiringPartnerContactController($view, $model);
    }


}