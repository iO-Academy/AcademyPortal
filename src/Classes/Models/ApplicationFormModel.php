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
     * @return assoc_array of cohorts
     */
    public function getCohorts() {
        $query = $this->db->prepare('SELECT `date` FROM `cohorts`;');
        $query->execute();
        $result = $query->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }

    /**
     * Gets all the hear about options from the database.
     * 
     * @return assoc_array of hear about options.
     */
    public function getHearAbout() {
        $query = $this->db->prepare('SELECT `hearAbout` FROM `hearAbout`;');
        $query->execute();
        $result = $query->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }
}