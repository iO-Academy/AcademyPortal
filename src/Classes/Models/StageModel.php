<?php

namespace Portal\Models;

class StageModel
{
    private $db;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    /**
     * Sets the 'deleted' flag to '1' for a record with a given id.
     *
     * @param $id
     *
     * @return boolean for success or failure of the query
     */
    public function deleteStage($id)
    {
        $query = $this->db->prepare("UPDATE `stages` SET `deleted` = '1' WHERE `id` = :id");
        $query->bindParam(':id', $id);
        return $query->execute();
    }
}
