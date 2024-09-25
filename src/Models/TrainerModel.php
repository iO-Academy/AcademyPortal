<?php

namespace Portal\Models;

use PDO;
use Portal\Entities\TrainerEntity;

class TrainerModel
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    /**
     * Queries the db and returns an array of trainers
     */
    public function getAllTrainers(): array
    {
        $query = $this->db->prepare(
            "SELECT `id`, `name`, `email`, `notes`, `deleted` FROM `trainers`;"
        );
        $query->setFetchMode(PDO::FETCH_CLASS, TrainerEntity::class);
        $query->execute();
        return $query->fetchAll();
    }

    /**
     * Add a new trainer to the database
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
     */
    public function deleteTrainer($id): bool
    {
        $query = $this->db->prepare(
            "UPDATE `trainers` SET `deleted` = 1 WHERE `id` = :id;"
        );
        $query->bindParam(':id', $id);
        return $query->execute();
    }

    public function getTrainerById($id): bool
    {
        $query = $this->db->prepare(
            "SELECT `id`, `name`, `email`, `notes`, `deleted` FROM `trainers` WHERE `id` = :id; "
        );
        $query->bindParam(':id', $id);
        $query->setFetchMode(PDO::FETCH_CLASS, TrainerEntity::class);
        return $query->execute();
    }

    public function getTrainerForEdit($id): TrainerEntity // Return TrainerEntity or null if not found
    {
        $query = $this->db->prepare(
            "SELECT `id`, `name`, `email`, `notes`, `deleted` FROM `trainers` WHERE `id` = :id; "
        );
        $query->bindParam(':id', $id);
        $query->setFetchMode(PDO::FETCH_CLASS, TrainerEntity::class);
        $query->execute();

        return $query->fetch(); // Fetch the TrainerEntity object
    }

    public function editTrainer(array $trainer): bool
    {
        $query = $this->db->prepare(
            "UPDATE `trainers` SET `name` = :name, `email` = :email, `notes` = :notes WHERE `id` = :id;"
        );
        $query->bindParam(':name', $trainer['name']);
        $query->bindParam(':email', $trainer['email']);
        $query->bindParam(':notes', $trainer['notes']);
        $query->bindParam(':id', $trainer['id']);
        return $query->execute();
    }
}
