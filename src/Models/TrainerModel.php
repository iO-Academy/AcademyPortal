<?php

namespace Portal\Models;

use Portal\Entities\TrainerEntity;

class TrainerModel
{
    private $db;

    /**
     * Constructor assigns db PDO to this object
     *
     * @param \PDO $db
     */
    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    /**
     * Queries the db and returns an array of trainers
     *
     * @param \PDO $db
     * @return array
     */
    public function getAllTrainers(): array
    {
        $query = $this->db->prepare(
            "SELECT `id`, `name`, `email`, `notes`, `deleted` FROM `trainers`;"
        );
        $query->setFetchMode(\PDO::FETCH_CLASS, TrainerEntity::class);
        $query->execute();
        return $query->fetchAll();
    }

    /**
     * Add a new trainer to the database
     *
     * @param \PDO $db
     * @param array $newTrainer
     * @return boolean
     */
    public function addNewTrainer(array $newTrainer): bool
    {
        $query = $this->db->prepare(
            "INSERT INTO `trainers` (`name`, `email`, `notes`)
            VALUES (:name, :email, :notes);"
        );
        $query->bindParam(':name', $newTrainer['name']);
        $query->bindParam(':email', $newTrainer['email']);
        $query->bindParam(':notes', $newTrainer['notes']);
        return $query->execute();
    }

    /**
     * Updates deleted field to 1
     *
     * @param \PDO $db
     * @param string $id
     * @return boolean
     */
    public function deleteTrainer($id): bool
    {
        $query = $this->db->prepare(
            "UPDATE `trainers` SET `deleted` = 1 WHERE `id` = :id;"
        );
        $query->bindParam(':id', $id);
        return $query->execute();
    }

    public function getTrainerById($id)
    {
        $query = $this->db->prepare(
            "SELECT `id`, `name`, `email`, `notes`, `deleted` FROM `trainers` WHERE `id` = :id; "
        );
        $query->bindParam(':id', $id);
        $query->setFetchMode(\PDO::FETCH_CLASS, TrainerEntity::class);
        return $query->execute();
    }
}
