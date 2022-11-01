<?php

namespace Portal\Models;

use PDO;

class TeamModel
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function createTeam($trainer)
    {
        $sql = 'INSERT INTO `teams` (`trainer`) VALUES (?);';
        $query = $this->db->prepare($sql);
        $result = $query->execute([$trainer]);
        if ($result) {
            return $this->db->lastInsertId();
        }
        return false;
    }
}
