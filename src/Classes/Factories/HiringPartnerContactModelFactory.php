<?php

namespace Portal\Factories;

use Psr\Container\ContainerInterface;
use Portal\Models\HiringPartnerContactModel;

class HiringPartnerContactModelFactory
{
    /** Calls addHiringPartnerContact method
     *
     * @param $container
     *
     * @return HiringPartnerContactModel returns JSON
     */
    public function __invoke(ContainerInterface $container) : HiringPartnerContactModel
    {
        $db = $container->get('dbConnection');
        return new HiringPartnerContactModel($db);
    }
}