<?php

namespace Portal\Factories;

use Psr\Container\ContainerInterface;
use Portal\Models\HiringPartnerContactsModel;

class HiringPartnerContactsModelFactory
{
    /**
     * Calls addHiringPartnerContact method
     *
     * @param $container
     *
     * @return HiringPartnerContactsModel returns instantiation of the model
     */
    public function __invoke(ContainerInterface $container) : HiringPartnerContactsModel
    {
        $db = $container->get('dbConnection');
        return new HiringPartnerContactsModel($db);
    }
}