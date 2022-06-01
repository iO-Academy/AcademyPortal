<?php

namespace Portal\Models;

use PDO;
use Portal\Entities\CourseEntity;

class CourseModel
{
    private $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    /**
     * Get all courses from the database
     *
     * @return array An array of Courses
     */
    public function getAllCourses(): array
    {
        $sql = 'SELECT `id`,
                `courses`.`start_date` AS `startDate`,
                `courses`.`end_date` AS `endDate`,
                `name`,
                `trainer`,
                `notes`,
                `in_person` AS `inPerson`,
                `remote`
                FROM `courses`;';
        $query = $this->db->prepare($sql);
        $query->setFetchMode(\PDO::FETCH_CLASS, CourseEntity::class);
        $query->execute();
        return $query->fetchAll();
    }

    /**
     * Add a new course to the database
     *
     * @param [type] $newCourse
     * @return boolean True if operation succeeded
     */
    public function addCourse(array $newCourse): bool
    {
        $query = $this->db->prepare("INSERT INTO `courses` (
            `start_date`,
            `end_date`,
            `name`,
            `trainer`,
            `notes`,
            `in_person`,
            `remote`
            ) 
            VALUES (
            :startDate, 
            :endDate, 
            :name,
            :trainer,
            :notes,
            :in_person,
            :remote);");

        $startDate = $newCourse['startDate'];
        $endDate = $newCourse['endDate'];
        $name = $newCourse['name'];
        $trainer = $newCourse['trainer'];
        $notes = $newCourse['notes'];
        $in_person = $newCourse['in_person'];
        $remote = $newCourse['remote'];

        $query->bindParam(':startDate', $startDate);
        $query->bindParam(':endDate', $endDate);
        $query->bindParam(':name', $name);
        $query->bindParam(':trainer', $trainer);
        $query->bindParam(':notes', $notes);
        $query->bindParam(':in_person', $in_person);
        $query->bindParam(':remote', $remote);
        return $query->execute();
    }
}
