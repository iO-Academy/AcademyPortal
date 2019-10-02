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
        $sql = 'SELECT `events`.`id`, `events`.`name`, `category`, 
        `event_categories`.`name` AS `category_name`, `location`, `date`, `start_time`, 
        `end_time`, `notes` 
        FROM `events`
        LEFT JOIN `event_categories` ON `events`.`category` = `event_categories`.`id`
        ORDER BY `date` DESC;';
        $query = $this->db->prepare($sql);
        $query->execute();
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
        $query->bindParam(':name', $newEvent->getName());
        $query->bindParam(':category', $newEvent->getCategory());
        $query->bindParam(':location', $newEvent->getLocation());
        $query->bindParam(':date', $newEvent->getDate());
        $query->bindParam(':startTime', $newEvent->getStartTime());
        $query->bindParam(':endTime', $newEvent->getEndTime());
        $query->bindParam(':notes', $newEvent->getNotes());
        return $query->execute();
    }
}
