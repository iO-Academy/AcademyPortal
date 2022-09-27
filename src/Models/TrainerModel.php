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
}
