<?php


namespace Portal\Factories;

use Portal\Controllers\CompanyDetailsModalController;
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
