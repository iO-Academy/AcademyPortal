<?php

namespace Portal\Factories;

use Portal\Models\HiringPartnerModel;

class HiringPartnerModelFactory
{
    /**
     * @param $c
     * @return HiringPartnerModel
     */
    public function __invoke($c)
    {
        $db = $c->dbConnection;
        return new HiringPartnerModel($db);
    }

}