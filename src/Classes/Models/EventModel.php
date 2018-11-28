<?php

namespace Portal\Models;

class EventModel
{
    private $db;

    /**
     * EventModel constructor.
     * @param $db
     */
    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    public function getDropdownData()
    {
        $stmt = $this->db->query('SELECT id, type FROM eventTypes;');
        return $stmt->fetchAll();
    }

}