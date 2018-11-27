<?php
/**
 * Created by PhpStorm.
 * User: imogen
 * Date: 27/11/2018
 * Time: 15:45
 */

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