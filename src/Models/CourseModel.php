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
            `notes`,
            `in_person`,
            `remote`
            ) 
            VALUES (
            :startDate, 
            :endDate, 
            :name,
            :notes,
            :in_person,
            :remote);");

        $startDate = $newCourse['startDate'];
        $endDate = $newCourse['endDate'];
        $name = $newCourse['name'];
        $notes = $newCourse['notes'];
        $in_person = $newCourse['in_person'];
        $remote = $newCourse['remote'];

        $query->bindParam(':startDate', $startDate);
        $query->bindParam(':endDate', $endDate);
        $query->bindParam(':name', $name);
        $query->bindParam(':notes', $notes);
        $query->bindParam(':in_person', $in_person);
        $query->bindParam(':remote', $remote);
        return $query->execute();
    }

    public function getTrainersByCourseId()
    {
        $query = $this->db->prepare(
            'SELECT `courses_trainers`.`course_id`, `trainers`.`name` FROM `courses_trainers` 
                LEFT JOIN `trainers` 
                    ON `courses_trainers`.`trainer_id` = `trainers`.`id`;'
        );
        $query->setFetchMode(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
        $query->execute();
        return $query->fetchAll();
    }
}
