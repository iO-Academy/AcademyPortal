<?php

namespace Portal\Models;

class ApplicationFormModel
{
    private $db;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    /**
     * Gets all the cohorts from the database.
     *
     * @return array $result is data from cohorts fields.
     */
    public function getCohorts()
    {
        $query = $this->db->prepare('SELECT `id`, `date` FROM `cohorts`;');
        $query->execute();
        $result = $query->fetchAll();
        return $result;
    }

    /**
     * Gets all the hear about options from the database.
     *
     * @return array $result is data from hearAbout fields.
     */
    public function getHearAbout()
    {
        $query = $this->db->prepare('SELECT `id`, `hearAbout` FROM `hear_about`;');
        $query->execute();
        $result = $query->fetchAll();
        return $result;
    }

    /**
     * Gets all the taster sessions from the database.
     *
     * @return array $result is data from events fields.
     */
    public function getTasterSessions(): array
    {
        $query = $this->db->prepare("SELECT `events`.`id`, `events`.`name`, `date` FROM `events` 
            LEFT JOIN `event_categories` ON `event_categories`.`id` = `events`.`category` 
            WHERE `event_categories`.`name` = 'Taster Session';");
        $query->execute();
        $result = $query->fetchAll();
        return $result;
    }
}
