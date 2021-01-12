<?php


namespace Portal\Factories\Controllers\API;

use Portal\Controllers\API\CompanyDetailsModalController;
use Psr\Container\ContainerInterface;

class CompanyDetailsModalControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $model = $container->get('HiringPartnerModel');
        $veiw = $container->get('renderer');
        return new CompanyDetailsModalController($model, $veiw);
    }
}
