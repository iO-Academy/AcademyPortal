<?php

namespace Portal\Models;

use phpDocumentor\Reflection\Types\Boolean;
use \Portal\Entities\StageEntity;

class StageModel
{
    private $db;

    /** Constructor assigns db PDO to this object
     *
     * @param \PDO $db
     */
    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    /** Queries the database and returns the highest current stage number as an integer
     *
     * @return int
     */
    public function getHighestOrderNo() : int
    {
        $query = $this->db->prepare("SELECT MAX(`order`) FROM `stages` WHERE `deleted` = 0;");
        $query->execute();
        $result = $query->fetch();
        return ($result['MAX(`order`)'] ?? 0);
    }

    /** Adds new stage to database and returns a boolean based on success or failure
     *
     * @param StageEntity $stageEntity
     * @return bool
     */
    public function createStage(StageEntity $stageEntity) : bool
    {
        $query = $this->db->prepare("INSERT INTO `stages` (`title`, `order`) VALUES (:title, :order);");
        $query->bindParam(':title', $stageEntity->getStageTitle());
        $query->bindParam(':order', $stageEntity->getStageOrder());
        return $query->execute();
    }

    /**
     *  Gets all the stages that are not deleted from stages table sorted by order
     *
     * @return array of stage entities
     */
    public function getAllStages()
    {
        $query = $this->db->prepare(
            'SELECT `id`, `title`, `order`, `deleted` FROM `stages` WHERE `deleted` = 0 ORDER BY `order`;'
        );
        $query->setFetchMode(\PDO::FETCH_CLASS, 'Portal\Entities\StageEntity');
        $query->execute();
        return $query->fetchAll();
    }

     /** Sets the 'deleted' flag to '1' and 'order' value to '0' for a record with a given id.
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
    public function updateStage(int $id, string $title, int $order) : bool
    {
        $query = $this->db->prepare("UPDATE `stages` SET `title` = :title, `order` = :newOrder WHERE `id` = :id");
        $query->bindParam(':id', $id);
        $query->bindParam(':title', $title);
        $query->bindParam(':newOrder', $order);

        return $query->execute();
    }

    public function getDB() : \PDO
    {
        return $this->db;
    }
}
