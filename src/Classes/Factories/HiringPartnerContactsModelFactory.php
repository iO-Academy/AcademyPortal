<?php

namespace Portal\Factories;

use Psr\Container\ContainerInterface;
use Portal\Models\HiringPartnerContactsModel;

class HiringPartnerContactModelFactory
{
    /** Calls addHiringPartnerContact method
     *
     * @param $container
     *
     * @return HiringPartnerContactsModel returns JSON
     */
    public function __invoke(ContainerInterface $container) : HiringPartnerContactsModel
    {
        $db = $container->get('dbConnection');
        return new HiringPartnerContactsModel($db);
    }
}