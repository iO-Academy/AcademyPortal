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
}
