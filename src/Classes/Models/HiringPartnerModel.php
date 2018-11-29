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

    /**
     * Gets company size brackets from database
     * @return array each id and size bracket pair
     */
    public function getDropdownData() {
        $stmt = $this->db->query('SELECT id, size FROM companySizeLink');
        return $stmt->fetchAll();
    }
}