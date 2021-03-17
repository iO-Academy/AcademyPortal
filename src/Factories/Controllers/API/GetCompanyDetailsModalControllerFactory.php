<?php

namespace Portal\Factories\Controllers\API;

use Portal\Controllers\API\GetCompanyDetailsModalController;
use Psr\Container\ContainerInterface;

class GetCompanyDetailsModalControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $model = $container->get('HiringPartnerModel');
        $veiw = $container->get('renderer');
        return new GetCompanyDetailsModalController($model, $veiw);
    }
}
