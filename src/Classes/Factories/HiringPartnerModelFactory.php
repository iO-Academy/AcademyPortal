<?php

namespace Portal\Factories;

use Portal\Models\HiringPartnerModel;

class HiringPartnerModelFactory
{
    /**
     * @param $container
     * @return HiringPartnerModel
     */
    public function __invoke($container)
    {
        $db = $container->dbConnection;
        return new HiringPartnerModel($db);
    }

}