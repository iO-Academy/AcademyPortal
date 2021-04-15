<?php

namespace Portal\Models;

use phpDocumentor\Reflection\Types\Boolean;
use Portal\Entities\OptionsEntity;
use Portal\Entities\StageEntity;

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

    /** Queries the database and returns the next stage id in an array
     * @param int $currentStageId
     * @return array
     */
    public function getNextStageId(int $currentStageId): array
    {
        $query = $this->db->prepare(
            "SELECT `id` FROM `stages` WHERE `deleted` = 0 AND `id` > ? ORDER BY `id` ASC LIMIT 1;"
        );
        $query->execute([$currentStageId]);
        $result = $query->fetch();
        return $result;
    }

    /** Queries the database and returns the highest current stage number as an integer
     *
     * @return int
     */
    public function getHighestOrderNo(): int
    {
        $query = $this->db->prepare("SELECT MAX(`order`) FROM `stages` WHERE `deleted` = 0;");
        $query->execute();
        $result = $query->fetch();
        return ($result['MAX(`order`)'] ?? 0);
    }

    /** Queries the db and returns an array with one result stored under 'stagesCount'
     *
     * @return array
     */
    public function stagesCount(): array
    {
        $query = $this->db->prepare(
            "SELECT COUNT(`id`) AS 'stagesCount' FROM `stages` WHERE `deleted` = 0;"
        );
        $query->setFetchMode(\PDO::FETCH_ASSOC);
        $query->execute();
        return $query->fetch();
    }

    /** Adds new stage to database and returns a boolean based on success or failure
     *
     * @param array $stageEntity
     * @return bool
     */
    public function createStage(array $stageEntity): bool
    {
        $query = $this->db->prepare(
            "INSERT INTO `stages` (`title`, `order`, `student`) VALUES (:title, :order, :student);"
        );
        $query->bindValue(':title', $stageEntity['title']);
        $query->bindValue(':order', $stageEntity['order']);
        $query->bindValue(':student', $stageEntity['student']);
        return $query->execute();
    }

    /**
     * Gets all the stage titles from the database
     *
     * @return array
     */
    public function getStageTitles(): array
    {
        $query = $this->db->prepare('SELECT `id`, `title`, `student` FROM `stages`;');
        $query->execute();
        return $query->fetchAll();
    }

    /**
     *  Gets all the stages that are not deleted from stages table sorted by order
     *
     * @return array of stage entities
     */
    public function getAllStages(): array
    {
        $query = $this->db->prepare(
            'SELECT `id`, `title`, `order`, `student`, `deleted` FROM `stages` WHERE `deleted` = 0 ORDER BY `order`;'
        );
        $query->setFetchMode(\PDO::FETCH_CLASS, StageEntity::class);
        $query->execute();
        $stages = $query->fetchAll();

        $query = $this->db->prepare(
            'SELECT `id`, `option`, `stageId` FROM `options` WHERE `deleted` = 0;'
        );
        $query->setFetchMode(\PDO::FETCH_CLASS, OptionsEntity::class);
        $query->execute();
        $options = $query->fetchAll();

        foreach ($stages as $stage) {
            $stageOptions = [];
            foreach ($options as $option) {
                if ($stage->getStageId() == $option->getStageId()) {
                    $stageOptions[] = $option;
                }
            }
            $stage->setOptions($stageOptions);
        }
        return $stages;
    }

    /** Sets the 'deleted' flag to '1' and 'order' value to '0' for a record with a given id.
     *
     * @param integer $id
     *
     * @return boolean for success or failure of the query
     */
    public function deleteStage(int $id): bool
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
    public function getStageById(int $id): StageEntity
    {
        $query = $this->db->prepare('SELECT `id`, `title`, `order`, `deleted` FROM `stages` WHERE `id`=:id');

        $query->setFetchMode(\PDO::FETCH_CLASS, 'Portal\Entities\StageEntity');
        $query->bindParam(':id', $id);
        $query->execute();
        $stage = $query->fetch();
        $stage->setOptions($this->getOptionsByStageId($id));

        return $stage;
    }

    /**
     * Updates the 'title' value of a record with a given id.
     * @param int $id
     * @param string $newTitle
     * @return bool
     */
    public function updateStage(int $id, string $title, int $order, int $isStudent): bool
    {
        $query = $this->db->prepare(
            "UPDATE `stages` SET `title` = :title, `order` = :newOrder, `student` = :student WHERE `id` = :id"
        );
        $query->bindParam(':id', $id);
        $query->bindParam(':title', $title);
        $query->bindParam(':newOrder', $order);
        $query->bindParam(':student', $isStudent);

        return $query->execute();
    }

    public function updateAllStages(array $stages): bool
    {
        try {
            $this->db->beginTransaction();
            foreach ($stages as $stage) {
                $this->updateStage($stage['id'], $stage['title'], $stage['order'], $stage['student']);
            }
            $this->db->commit();
            return true;
        } catch (\PDOException $e) {
            $this->db->rollBack();
            throw new \Exception('Cannot update stages.');
        }
    }

    /**
     * Creates a new option in the options table.
     * @param string $option
     * @param int $stageId
     * @return bool
     */
    public function createOption(string $option, int $stageId): bool
    {
        $query = $this->db->prepare("INSERT INTO `options` (`option`, `stageId`) VALUES (:optionText, :stageId);");
        $query->bindParam(':optionText', $option);
        $query->bindParam(':stageId', $stageId);
        return $query->execute();
    }

    /**
     * Updates the 'option' value of an entry in the options table with a given id.
     * @param string $option
     * @param int $optionId
     * @return bool
     */
    public function updateOption(array $option): bool
    {
        $query = $this->db->prepare("UPDATE `options` SET `option` = :optionText WHERE `id` = :id");
        $query->bindParam(':id', $option['optionId']);
        $query->bindParam(':optionText', $option['option']);
        return $query->execute();
    }

    /**
     * Deletes (soft delete) the 'option' value of an entry in the options table with a given id.
     * @param int $optionId
     * @return bool
     */
    public function deleteOption(int $optionId): bool
    {
        $query = $this->db->prepare("UPDATE `options` SET `deleted` = '1' WHERE `id` = :optionId");
        $query->bindParam(':optionId', $optionId);
        return $query->execute();
    }

    /**
     * getOptionsByStageId - given a stage ID number, queries the DB to return all options which are assigned to that
     * stage
     *
     * @param integer $stageId The id of the stage whose options are required
     * @return array an array of all options assigned to the listed stage
     */
    public function getOptionsByStageId(int $stageId): array
    {
        $query = $this->db->prepare(
            "SELECT `id`, `option`, `stageId` FROM `options` WHERE `stageId` = :stageId AND `deleted` = '0';"
        );
        $query->bindParam(':stageId', $stageId);
        $query->execute();
        return $query->fetchAll();
    }

    /**
     * Gets all the ids and options from the options table in the db
     *
     * @return array
     */
    public function getStageOptions(): array
    {
        $query = $this->db->prepare('SELECT `id`, `option`, `stageId` FROM `options`;');
        $query->execute();
        return $query->fetchAll();
    }

    /**
     * Deletes (soft delete) all the 'options' of a stage with a given id.
     * @param int $stageId
     * @return bool
     */
    public function deleteAllOptions(int $stageId): bool
    {
        $query = $this->db->prepare("UPDATE `options` SET `deleted` = '1' WHERE `stageId` = :stageId");
        $query->bindParam(':stageId', $stageId);
        return $query->execute();
    }
}
