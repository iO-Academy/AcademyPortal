<?php

namespace Portal\Models;

class EventModel
{
    private $db;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    /**
     * Get all events from the database
     *
     * @return array An array of Events
     */
    public function getEvents():array
    { 
        $sql = 'SELECT `id`, `name`, `category`, `date`, `start_time`, `end_time`, `notes` FROM `events`;';
        $query = $this->db->prepare($sql);
        return $query->fetchAll();
    }

    /**
     * Get all event categories from the database
     *
     * @return array An array of event categories
     */
    public function getEventCategories():array
    { 
        $sql = 'SELECT `id`, `name` FROM `event_categories`';
        $query = $this->db->prepare($sql);
        return $query->fetchAll();
    }

    /**
     * Add a new event to the database
     *
     * @param [type] $newEvent
     * @return boolean True if operation succeeded
     */
    public function addEvent($newEvent):bool
    {
        return false;
    }
}
