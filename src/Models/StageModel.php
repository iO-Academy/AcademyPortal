<?php

namespace Portal\Models;

use PDO;
use Portal\Entities\OptionsEntity;
use Portal\Entities\StageEntity;

class StageModel
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    /**
     * Queries the database and returns the next stage id in an array
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

    /**
     * Queries the database and returns the highest current stage number as an integer
     */
    public function getHighestOrderNo(): int
    {
        $query = $this->db->prepare("SELECT MAX(`order`) FROM `stages` WHERE `deleted` = 0;");
        $query->execute();
        $result = $query->fetch();
        return ($result['MAX(`order`)'] ?? 0);
    }

    /**
     * Queries the db and returns an array with one result stored under 'stagesCount'
     */
    public function stagesCount(): array
    {
        $query = $this->db->prepare(
            "SELECT COUNT(`id`) AS 'stagesCount' FROM `stages` WHERE `deleted` = 0;"
        );
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $query->execute();
        return $query->fetch();
    }

    /**
     * Adds new stage to database and returns a boolean based on success or failure
     */
    public function createStage(array $stageEntity): bool
    {
        $query = $this->db->prepare(
            "INSERT INTO `stages` (`title`, `order`, `student`, `withdrawn`, `rejected`, `notAssigned`) 
            VALUES (:title, :order, :student, :withdrawn, :rejected, :notAssigned);"
        );
        $query->bindValue(':title', $stageEntity['title']);
        $query->bindValue(':order', $stageEntity['order']);
        $query->bindValue(':student', $stageEntity['student']);
        $query->bindValue(':withdrawn', $stageEntity['withdrawn']);
        $query->bindValue(':rejected', $stageEntity['rejected']);
        $query->bindValue(':notAssigned', $stageEntity['notAssigned']);
        return $query->execute();
    }

    /**
     * Gets all the stage titles from the database
     */
    public function getStageTitles(): array
    {
        $query = $this->db->prepare(
            'SELECT `id`, `title`, `student`, `withdrawn`, `rejected`, `notAssigned` 
            FROM `stages`;'
        );
        $query->execute();
        return $query->fetchAll();
    }

    /**
     * Gets all the stages that are not deleted from stages table sorted by order
     */
    public function getAllStages(): array
    {
        $query = $this->db->prepare(
            "SELECT `st`.`id`, `st`.`title`, `st`.`order`, `st`.`student`, `st`.`deleted`,
                `st`.`withdrawn`, `st`.`rejected`, `st`.`notAssigned`,
                count(`a`.`id`) AS 'hasAssignees'
                FROM `stages` AS `st`
                LEFT JOIN `applicants` AS `a` ON `st`.`id` = `a`.`stageId`
                    AND `a`.`deleted` = '0'
                WHERE `st`.`deleted` = '0'     
                GROUP BY `st`.`id`
                ORDER BY `st`.`order`;"
        );
        $query->setFetchMode(PDO::FETCH_CLASS, StageEntity::class);
        $query->execute();
        $stages = $query->fetchAll();

        $query = $this->db->prepare(
            "SELECT `op`.`id`, `op`.`option`, `op`.`stageId`, count(`a`.`id`) AS 'hasAssignees'
                FROM `options` AS `op`
                LEFT JOIN `applicants` AS `a` ON `op`.`id` = `a`.`stageOptionId`
                AND `op`.`deleted` = '0' 
                AND `a`.`deleted` = '0'
                GROUP BY `op`.`id`"
        );
        $query->setFetchMode(PDO::FETCH_CLASS, OptionsEntity::class);
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
     */
    public function deleteStage(int $id): bool
    {
        $query = $this->db->prepare("UPDATE `stages` SET `deleted` = '1', `order` = '0' WHERE `id` = :id");
        $query->bindParam(':id', $id);
        return $query->execute();
    }

    /**
     * Retrieves a stage with the specified id
     */
    public function getStageById(int $id): StageEntity
    {
        $query = $this->db->prepare('SELECT `id`, `title`, `order`, `deleted` FROM `stages` WHERE `id`=:id');

        $query->setFetchMode(PDO::FETCH_CLASS, 'Portal\Entities\StageEntity');
        $query->bindParam(':id', $id);
        $query->execute();
        $stage = $query->fetch();
        $stage->setOptions($this->getOptionsByStageId($id));

        return $stage;
    }

    /**
     * Retrieves a stage title by the specified id
     */
    public function getStageTitleById(int $id): array
    {
        $query = $this->db->prepare('SELECT `title` FROM `stages` WHERE `id`= :id');

        $query->setFetchMode(PDO::FETCH_ASSOC);
        $query->bindParam(':id', $id);
        $query->execute();
        $stageTitle = $query->fetch();

        return $stageTitle;
    }

    /**
     * Updates the 'title' value of a record with a given id
     */
    public function updateStage(
        int $id,
        string $title,
        int $order,
        int $isStudent,
        int $isWithdrawn,
        int $isRejected,
        int $isNotAssigned
    ): bool {
        $query = $this->db->prepare("UPDATE `stages` 
            SET `title` = :title, 
            `order` = :newOrder, 
            `student` = :student, 
            `withdrawn` = :withdrawn, 
            `rejected` = :rejected,
            `notAssigned` = :notAssigned
            WHERE `id` = :id");
        $query->bindParam(':id', $id);
        $query->bindParam(':title', $title);
        $query->bindParam(':newOrder', $order);
        $query->bindParam(':student', $isStudent);
        $query->bindParam(':withdrawn', $isWithdrawn);
        $query->bindParam(':rejected', $isRejected);
        $query->bindParam(':notAssigned', $isNotAssigned);

        return $query->execute();
    }

    public function updateAllStages(array $stages): bool
    {
        try {
            $this->db->beginTransaction();
            foreach ($stages as $stage) {
                $this->updateStage(
                    $stage['id'],
                    $stage['title'],
                    $stage['order'],
                    $stage['student'],
                    $stage['withdrawn'],
                    $stage['rejected'],
                    $stage['notAssigned']
                );
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
     * @param array{'optionId': int, 'option': string} $option
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
     */
    public function getStageOptions(): array
    {
        $query = $this->db->prepare('SELECT `id`, `option`, `stageId` FROM `options`;');
        $query->execute();
        return $query->fetchAll();
    }

    /**
     * Deletes (soft delete) all the 'options' of a stage with a given id.
     */
    public function deleteAllOptions(int $stageId): bool
    {
        $query = $this->db->prepare("UPDATE `options` SET `deleted` = '1' WHERE `stageId` = :stageId");
        $query->bindParam(':stageId', $stageId);
        return $query->execute();
    }

    public function getFirstStudentStage(): int
    {
        $query = $this->db->prepare("SELECT MIN(`id`) AS 'id' FROM `stages` WHERE `student` = 1");
        $query->execute();
        return $query->fetchColumn();
    }

    public function getOptionById($id): ?array
    {
        $query = $this->db->prepare("SELECT * FROM `options` WHERE `id` = :id ;");
        $query->bindParam(':id', $id);
        $query->execute();
        return $query->fetchAll();
    }
}
