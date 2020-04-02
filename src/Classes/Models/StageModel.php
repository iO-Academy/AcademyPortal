<?php

namespace Portal\Models;

use phpDocumentor\Reflection\Types\Boolean;
use Portal\Entities\StageEntity;

class StageModel
{
    private $db;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    /**
     * Sets the 'deleted' flag to '1' and 'order' value to '0' for a record with a given id.
     *
     * @param integer $id
     *
     * @return boolean for success or failure of the query
     */
    public function deleteStage(int $id) : bool
    {
        $query = $this->db->prepare("UPDATE `stages` SET `deleted` = '1', `order` = '0' WHERE `id` = :id");
        $query->bindParam(':id', $id);
        return $query->execute();
    }

    /**
     * Retrieves a stage with the specified id
     *
     * @param integer $id
     * @return StageEntity object
     *
     */
    public function getStageById(int $id) : StageEntity
    {
        $query = $this->db->prepare('SELECT `id`, `title`, `order`, `deleted` FROM `stages` WHERE `id`=:id');

        $query->setFetchMode(\PDO::FETCH_CLASS, 'Portal\Entities\StageEntity');
        $query->bindParam(':id', $id);
        $query->execute();
        return $query->fetch();
    }

    /**
     * Updates the 'title' value of a record with a given id.
     * @param int $id
     * @param string $newTitle
     * @return bool
     */
    public function updateStage(int $id, string $newTitle) : bool
    {
        $query = $this->db->prepare("UPDATE `stages` SET `title` = :newTitle WHERE `id` = :id");
        $query->bindParam(':id', $id);
        $query->bindParam(':newTitle', $newTitle);

        return $query->execute();
    }
}
