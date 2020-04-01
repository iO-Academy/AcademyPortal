<?php

namespace Portal\Models;

use \Portal\Entities\StageEntity;

class StageModel
{
    private $db;

    /** Constructor assigns db PDO to this object
     *
     * StageModel constructor.
     * @param \PDO $db
     */
    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    /**
     * @return int
     */
    public function getHighestOrderNo() : int
    {
        $query = $this->db->prepare("SELECT MAX(`order`) FROM `stages` WHERE `deleted` = 0;");
        $query->execute();
        $result = $query->fetch();
        return ($result['MAX(`order`)'] ?? 0);
    }

    /**
     * @param StageEntity $stageEntity
     * @return bool
     */
    public function createStage(StageEntity $stageEntity)
    {
        $query = $this->db->prepare("INSERT INTO `stages` (`title`, `order`) VALUES (:title, :order);");
        $query->bindParam(':title', $stageEntity->getTitle());
        $query->bindParam(':order', $stageEntity->getOrder());
        return $query->execute();
    }
}
