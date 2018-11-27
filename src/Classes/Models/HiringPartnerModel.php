<?php

namespace Portal\Models;



class HiringPartnerModel
{
    private $db;

    /**
     * HiringPartnerModel constructor.
     * @param $db
     */
    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    public function insertNewHiringPartnerToDb() {
        $query = $this->db->prepare("INSERT INTO ``");
    }

}