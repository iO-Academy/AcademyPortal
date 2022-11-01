<?php

namespace Portal\Models;

use PDO;

class ApplicationFormModel
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    /**
     * Gets the courses data needed for the application form
     */
    public function getCohorts(): array
    {
        $query = $this->db->prepare('SELECT `id`, `start_date` AS "date" FROM `courses` WHERE `deleted` != 1;');
        $query->execute();
        return $query->fetchAll();
    }

    /**
     * Gets all the hear about options from the database.
     */
    public function getHearAbout(): array
    {
        $query = $this->db->prepare('SELECT `id`, `hearAbout` FROM `hear_about`;');
        $query->execute();
        $result = $query->fetchAll();
        return $result;
    }

    /**
     * Gets all the gender options from the database.
     */
    public function getGenders(): array
    {
        $query = $this->db->prepare('SELECT `id`, `gender` FROM `gender`;');
        $query->execute();
        $result = $query->fetchAll();
        return $result;
    }

    public function getBackgroundInfo(): array
    {
        $query = $this->db->prepare('SELECT `id`, `backgroundInfo` FROM `background_info`;');
        $query->execute();
        $result = $query->fetchAll();
        return $result;
    }
}
