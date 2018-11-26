<?php

namespace Portal\Models;


class ApplicantModel
{
    protected $db;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    public function insertIntoDb()
    {

    }
}