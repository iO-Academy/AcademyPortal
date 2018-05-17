<?php

namespace Portal\Models;

class ApplicationFormModel
{
    private $db;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    public function getCohorts() {
        $query = $this->db->prepare('SELECT `date` FROM `cohorts`;');
        $query->execute();
        $result = $query->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }

    public function getHearAbout() {
        $query = $this->db->prepare('SELECT `hearAbout` FROM `hearAbout`;');
        $query->execute();
        $result = $query->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }

    
}