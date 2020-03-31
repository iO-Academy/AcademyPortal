<?php

namespace Portal\Models;

class StageModel
{
    private $db;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }
}
