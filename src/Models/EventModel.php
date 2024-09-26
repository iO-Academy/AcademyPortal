<?php

namespace Portal\Models;

use PDO;
use Portal\Entities\CalendarEventEntity;

class EventModel
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    /**
     * Get all events from the database
     */
    public function getAllEvents(): array
    {
        $sql = 'SELECT `events`.`id`, `events`.`name`, `events`.`category`, 
        `event_categories`.`name` AS `category_name`, `location`, `date`, `start_time`, 
        `end_time`, `notes` 
        FROM `events`
        LEFT JOIN `event_categories` ON `events`.`category` = `event_categories`.`id`
        ORDER BY `date` DESC;';
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public function getAllCalendarEvents(): array
    {
        $sql = 'SELECT `events`.`id` AS `id`, `events`.`name` AS `title`, 
       `event_categories`.`id` AS `categoryId` , `event_categories`.`name` AS `categoryName`, 
       `date`, `start_time` AS `start`, `end_time` AS `end`
        FROM `events`
        LEFT JOIN `event_categories` ON `events`.`category` = `event_categories`.`id`
        ORDER BY `date` DESC;';
        $query = $this->db->prepare($sql);
        $query->setFetchMode(\PDO::FETCH_CLASS, CalendarEventEntity::class);
        $query->execute();
        return $query->fetchAll();
    }

    /**
     * Get future events from the database
     */
    public function getFutureEvents(): array
    {
        $sql = 'SELECT `events`.`id`, `events`.`name`, `events`.`category`, 
        `event_categories`.`name` AS `category_name`, `location`, `date`, `start_time`, 
        `end_time`, `notes`, `availableToHP`
        FROM `events`
        LEFT JOIN `event_categories` ON `events`.`category` = `event_categories`.`id`
        WHERE `date` > NOW()
        ORDER BY `date` DESC;';
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    /**
     * Get past events from the database
     */
    public function getPastEvents(): array
    {
        $sql = 'SELECT `events`.`id`, `events`.`name`, `events`.`category`, 
        `event_categories`.`name` AS `category_name`, `location`, `date`, `start_time`, 
        `end_time`, `notes` 
        FROM `events`
        LEFT JOIN `event_categories` ON `events`.`category` = `event_categories`.`id`
        WHERE `date` < NOW()
        ORDER BY `date` DESC;';
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    /**
     * Get all event categories from the database
     */
    public function getEventCategories(): array
    {
        $sql = 'SELECT `id`, `name` FROM `event_categories`';
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    /**
     * Add a new event to the database
     */
    public function addEvent(array $newEvent): bool
    {
        $query = $this->db->prepare("INSERT INTO `events` (
            `name`,
            `category`,
            `location`,
            `date`,
            `start_time`,
            `end_time`,
            `notes`,
            `availableToHP`
            ) 
            VALUES (
            :name, 
            :category, 
            :location,
            :date, 
            :startTime, 
            :endTime, 
            :notes,
            :availableToHP);");

        $query->bindParam(':name', $newEvent['name']);
        $query->bindParam(':category', $newEvent['category']);
        $query->bindParam(':location', $newEvent['location']);
        $query->bindParam(':date', $newEvent['date']);
        $query->bindParam(':startTime', $newEvent['startTime']);
        $query->bindParam(':endTime', $newEvent['endTime']);
        $query->bindParam(':notes', $newEvent['notes']);
        $query->bindParam(':availableToHP', $newEvent['availableToHP']);
        return $query->execute();
    }

    /** delete event from the database */
    public function deleteEvent($deleteTask) {
        $query = $this->db->prepare("UPDATE `events` SET `deleted` = 1 WHERE `id` = :deleted");
        $query->bindParam(':deleted', $deleteTask);
        $query->execute();
    }

    /**
     * Search future events from the database
     *
     * @param string $searchTerm of validated search term
     */
    public function searchFutureEvents(string $searchTerm): array
    {
        $sql = 'SELECT `events`.`id`, `events`.`name`, `events`.`category`, 
                `event_categories`.`name` AS `category_name`, `location`, `date`, `start_time`,`end_time`, `notes`
                FROM `events` 
                LEFT JOIN `event_categories` ON `events`.`category` = `event_categories`.`id` 
                WHERE `events`.`name` LIKE ? AND `date` > NOW() ORDER BY `date` DESC;';
        $query = $this->db->prepare($sql);
        $searchTerm = '%' . $searchTerm . '%';
        $query->execute([$searchTerm]);
        return $query->fetchAll();
    }


    /**
     * Search past events from the database
     */
    public function searchPastEvents(?string $searchTerm): array
    {
        $sql = 'SELECT `events`.`id`, `events`.`name`, `events`.`category`, 
                `event_categories`.`name` AS `category_name`, `location`, `date`, `start_time`,`end_time`, `notes` 
                FROM `events` 
                LEFT JOIN `event_categories` ON `events`.`category` = `event_categories`.`id` 
                WHERE `events`.`name` LIKE ? AND `date` < NOW() ORDER BY `date` DESC;';
        $query = $this->db->prepare($sql);
        $searchTerm = '%' . $searchTerm . '%';
        $query->execute([$searchTerm]);
        return $query->fetchAll();
    }

    /**
     * Gets events based on a specific category ID from the database
     *
     * @param int $previousMonths optional parameter indicating how many previous X months from the current date and
     * the future to be retrieved, defaults to all dates
     */

    public function getEventsByCategoryId(string $categoryId, int $previousMonths = 0): array
    {
        $sql = 'SELECT `events`.`id`, `events`.`name`, `events`.`category`, 
                `event_categories`.`name` AS `category_name`, `location`, `date`, `start_time`,`end_time`, `notes`
                FROM `events` 
                LEFT JOIN `event_categories` ON `events`.`category` = `event_categories`.`id` 
                WHERE `events`.`category` = :categoryId 
                AND `date` > curdate() - INTERVAL :previousMonths MONTH ORDER BY `date` ASC;';
        $query = $this->db->prepare($sql);
        $query->bindParam(':categoryId', $categoryId);
        $query->bindParam(':previousMonths', $previousMonths);
        $query->execute();
        return $query->fetchAll();
    }

    /**
     * Gets upcoming events based on an optional categoryId and searchQuery
     */
    public function getUpcomingEventsByCategoryIdAndSearch(?string $categoryId = null, ?string $searchQuery = ''): array
    {
        $sql = 'SELECT `events`.`id`, `events`.`name`, `events`.`category`, 
        `event_categories`.`name` AS `category_name`, `location`, `date`, `start_time`,`end_time`, `notes`, `deleted`
        FROM `events` 
        LEFT JOIN `event_categories` ON `events`.`category` = `event_categories`.`id` 
        WHERE `events`.`date` > NOW() AND `events`.`deleted` = 0 AND';
        if ($categoryId) {
            $sql .= ' `events`.`category` = :categoryId AND';
        }
        $sql .= ' `events`.`name` LIKE :searchQuery ORDER BY `date` ASC;';

        $query = $this->db->prepare($sql);
        if ($categoryId) {
            $query->bindParam(':categoryId', $categoryId);
        }
        $searchQuery = '%' . $searchQuery . '%';
        $query->bindParam(':searchQuery', $searchQuery);
        $query->execute();
        return $query->fetchAll();
    }

    /**
     * Gets past events based on an optional categoryId and searchQuery
     */
    public function getPastEventsByCategoryIdAndSearch(?string $categoryId = null, ?string $searchQuery = ''): array
    {
        $sql = 'SELECT `events`.`id`, `events`.`name`, `events`.`category`, 
        `event_categories`.`name` AS `category_name`, `location`, `date`, `start_time`,`end_time`, `notes`, `deleted`
        FROM `events` 
        LEFT JOIN `event_categories` ON `events`.`category` = `event_categories`.`id` 
        WHERE `events`.`date` < NOW() AND `events`.`deleted` = 0 AND';
        if ($categoryId) {
            $sql .= ' `events`.`category` = :categoryId AND';
        }
        $sql .= ' `events`.`name` LIKE :searchQuery ORDER BY `date` ASC;';

        $query = $this->db->prepare($sql);
        if ($categoryId) {
            $query->bindParam(':categoryId', $categoryId);
        }
        $searchQuery = '%' . $searchQuery . '%';
        $query->bindParam(':searchQuery', $searchQuery);
        $query->execute();
        return $query->fetchAll();
    }

    /**
     * Adds event id, hiring partner id and people attending to database
     */
    public function addHPToEvent(int $hiringPartner, int $event, $attendees = null): bool
    {
        $query = $this->db->prepare('INSERT INTO `events_hiring_partners` (
            `hiring_partner_id`, 
            `event_id`, 
            `people_attending`
            ) 
            VALUES (
            :hiringPartner, 
            :event, 
            :attendees);');
        $query->bindParam(':hiringPartner', $hiringPartner);
        $query->bindParam(':event', $event);
        $query->bindParam(':attendees', $attendees);
        return $query->execute();
    }

    /**
     * checks that the hiring partner has successfully been linked to the event in the database
     */
    public function checkLinkHP(int $hiringPartner, int $event): bool
    {
        $query = $this->db->prepare('SELECT `id` FROM `events_hiring_partners`
        WHERE  `event_id` = :event AND
        `hiring_partner_id` = :hiringPartner AND `deleted` = 0;');
        $query->bindParam(':hiringPartner', $hiringPartner);
        $query->bindParam(':event', $event);
        $query->execute();
        $linkToHp = $query->fetchAll();
        if (count($linkToHp) > 0) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Pulls hiring partner ids from database where they link to a specific event id
     */
    public function hpIdsByEventId(int $eventId): array
    {
        $statement = 'SELECT `hiring_partner_id`,`people_attending` 
        FROM `events_hiring_partners` WHERE  `event_id` = :eventId AND `deleted` = 0;';
        $query = $this->db->prepare($statement);
        $query->bindParam(':eventId', $eventId);
        $success = $query->execute();
        $hpIds = $query->fetchAll();
        return $hpIds;
    }

    /**
     * Deletes hiring partner from an event.
     */
    public function removeHiringPartnerFromEvent(int $eventId, int $hiringPartnerId): bool
    {
        $statement = 'UPDATE `events_hiring_partners` SET `deleted` = 1  
        WHERE `event_id` = :eventId AND `hiring_partner_id` = :hiringPartnerId;';
        $query = $this->db->prepare($statement);
        $query->bindParam(':eventId', $eventId);
        $query->bindParam(':hiringPartnerId', $hiringPartnerId);
        return $query->execute();
    }
}
