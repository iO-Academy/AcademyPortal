<?php

namespace Portal\Models;

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
    public function getAllTrainers(\PDO $db): array
    {
        $query = $this->db->prepare(
            "SELECT `id`, `name`, `email`, `notes`, `deleted` FROM `trainers`;"
        );
        $query->execute();
        return $query->fetchAll();
    }

    /**
     * Add a new trainer to a database
     *
     * @param \PDO $db
     * @param string $name
     * @param string $email
     * @param string $notes
     * @return boolean
     */
    public function addNewTrainer(\PDO $db, $name, $email, $notes): bool
    {
        $query = $this->db->prepare(
            "INSERT INTO `trainers` (`name`, `email`, `notes`)
            VALUES (:name, :email, :notes);"
        );
        $query->bindParam(':name', $name);
        $query->bindParam(':email', $email);
        $query->bindParam(':notes', $notes);
        return $query->execute();
    }

    /**
     * Updates deleted field to 1
     *
     * @param \PDO $db
     * @param string $id
     * @return boolean
     */
    public function deleteTrainer(\PDO $db, $id): bool
    {
        $query = $this->db->prepare(
            "UPDATE `trainers` SET `deleted` = 1 WHERE `id` = :id;"
        );
        $query->bindParam(':id', $id);
        return $query->execute();
    }
}
