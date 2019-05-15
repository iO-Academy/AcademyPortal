<?php

namespace Portal\Factories;

use Portal\Models\HiringPartnerModel;
use Psr\Container\ContainerInterface;

class HiringPartnerModelFactory
{
    /**
     * Factory that generate the hiring partner model
     *
     * @param ContainerInterface $container
     *
     * @return HiringPartnerModel
     */
    public function __invoke(ContainerInterface $container)
    {
        $db = $container->get('dbConnection');
        return new HiringPartnerModel($db);
    }
}
