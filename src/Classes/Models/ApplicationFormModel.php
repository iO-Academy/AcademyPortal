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
     * Gets all the hear about options from the database.
     *
     * @return array $result is data from hearAbout fields.
     */
    public function getHearAbout() {
        $query = $this->db->prepare('SELECT `id`, `hearAbout` FROM `hearAbout`;');
        $query->execute();
        $result = $query->fetchAll();
        return $result;
    }
}
