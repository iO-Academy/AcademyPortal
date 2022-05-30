<?php

namespace Portal\Models;

use PDO;

class EventCategoriesModel
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getEventCategories() {
    $sql = 'SELECT `id`, `name` FROM `event_categories`;';

    $query = $this->db->prepare($sql);
    $query->execute();
    return $query->fetchAll();
    }
}