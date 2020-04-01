<?php

namespace Portal\Models;

class StageModel
{
    private $db;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    public function getAllStages()
    {
        $query = $this->db->prepare
        (
        'SELECT `id`, `title`, `order`, `deleted` FROM `stages` WHERE `deleted` = 0 ORDER BY `order`;'
        );
        $query->setFetchMode(\PDO::FETCH_CLASS, 'Portal\Entities\StageEntity');
        $query->execute();
        return $query->fetchAll();
    }
}
