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

    /**
     * Queries event types and ids from database
     * @return array
     */
    public function getDropdownData()
    {
        $stmt = $this->db->query('SELECT id, type FROM eventTypes;');
        return $stmt->fetchAll();
    }

}