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
     * Gets the courses data needed for the application form
     *
     * @return array $result is data from courses table
     */
    public function getCohorts(): array
    {
        $query = $this->db->prepare('SELECT `id`, `start_date` AS "date" FROM `courses` WHERE `deleted` != 1;');
        $query->execute();
        return $query->fetchAll();
    }

    /**
     * Gets all the hear about options from the database.
     *
     * @return array $result is data from hearAbout fields.
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
     *
     * @return array $result is data from gender fields.
     */
    public function getGenders(): array
    {
        $query = $this->db->prepare('SELECT `id`, `gender` FROM `gender`;');
        $query->execute();
        $result = $query->fetchAll();
        return $result;
    }

    /**
     * @return array
     */
    public function getBackgroundInfo(): array
    {
        $query = $this->db->prepare('SELECT `id`, `backgroundInfo` FROM `background_info`;');
        $query->execute();
        $result = $query->fetchAll();
        return $result;
    }
}
