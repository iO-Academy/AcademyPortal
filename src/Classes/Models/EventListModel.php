<?php

namespace Portal\Models;


class EventListModel
{
    private $db;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    /**
     *
     */
    public function getEventData()
    {
       $query = $this->db->query('SELECT `eventName`, `date`, `location`, eventTypes.type, `startTime`, `endTime`, `notes` FROM `events` INNER JOIN `eventTypes`ON events.type = eventTypes.id;');
       return $query->fetchAll();
    }
}