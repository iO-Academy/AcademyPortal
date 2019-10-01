<?php

namespace Portal\Models;

use Portal\Entities\EventEntity;

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
        $sql = 'SELECT `id`, `name`, `category`, `location`, `date`, `start_time`, `end_time`, `notes` FROM `events`;';
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
        $query->execute();
        return $query->fetchAll();
    }

    /**
     * Add a new event to the database
     *
     * @param [type] $newEvent
     * @return boolean True if operation succeeded
     */
    public function addEvent(EventEntity $newEvent):bool
    {
        try {
            $query = $this->db->prepare("INSERT INTO `events` (
                `name`,
                `category`,
                `location`,
                `date`,
                `start_time`,
                `end_time`,
                `notes`
                ) 
                VALUES (
                :name, 
                :category, 
                :location,
                :date, 
                :startTime, 
                :endTime, 
                :notes);");
            $query->bindParam(':name', $newEvent->name);
            $query->bindParam(':category', $newEvent->category);
            $query->bindParam(':location', $newEvent->location);
            $query->bindParam(':date', $newEvent->date);
            $query->bindParam(':startTime', $newEvent->startTime);
            $query->bindParam(':endTime', $newEvent->endTime);
            $query->bindParam(':notes', $newEvent->notes);
            $query->execute();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}
