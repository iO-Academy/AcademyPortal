<?php

namespace Portal\Models;

class StageModel
{
    private $db;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    public function getHighestOrderNo() : int
    {
        $query = $this->db->prepare('SELECT MAX(`order`) FROM `stages` WHERE `deleted` = 0;');
        $query->execute();
        $result = $query->fetch();
        return $result['MAX(`order`)'];
    }
}
