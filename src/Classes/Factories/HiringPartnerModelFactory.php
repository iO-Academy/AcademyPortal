<?php

namespace Portal\Factories;


use Portal\Models\HiringPartnerModel;
use Psr\Container\ContainerInterface;


class HiringPartnerModelFactory
{


    /**
     * Creates new HiringPartnerModel with dependencies
     *
     * @param ContainerInterface $container
     *
     * @return HiringPartnerModel object with db connection injected
     */
    public function __invoke(ContainerInterface $container): HiringPartnerModel
    {
        $db = $container->get('dbConnection');
        return new HiringPartnerModel($db);
    }
}