<?php

namespace Portal\Models;

use PDO;
use Portal\Entities\CourseEntity;

class CourseModel
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    /**
     * Get all courses from the database
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
     * @return string ID of the course inserted
     */
    public function addCourse(array $newCourse): string
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
        $name = $newCourse['courseName'];
        $notes = $newCourse['notes'];
        $in_person = $newCourse['in_person'];
        $remote = $newCourse['remote'];

        $query->bindParam(':startDate', $startDate);
        $query->bindParam(':endDate', $endDate);
        $query->bindParam(':name', $name);
        $query->bindParam(':notes', $notes);
        $query->bindParam(':in_person', $in_person);
        $query->bindParam(':remote', $remote);
        $query->execute();
        return $this->db->lastInsertId();
    }

    /**
     * Updates the trainers and courses relationships using the link table
     */
    public function addTrainersToCourse(array $trainerIds, int $courseId): void
    {
        foreach ($trainerIds as $trainerId) {
            $query = $this->db->prepare(
                "INSERT INTO `courses_trainers` (`course_id`, `trainer_id`) 
                VALUES (:cid, :tid);"
            );

            $query->bindParam(':cid', $courseId);
            $query->bindParam(':tid', $trainerId);
            $query->execute();
        }
    }

    /**
     * Gets all trainers linked to course Id
     */
    public function getTrainersAndCourseId(): array
    {
        $query = $this->db->prepare(
            'SELECT `courses_trainers`.`course_id`, `trainers`.`name`, `trainers`.`deleted` FROM `courses_trainers` 
                LEFT JOIN `trainers` 
                    ON `courses_trainers`.`trainer_id` = `trainers`.`id`;'
        );
        $query->execute();
        return $query->fetchAll();
    }
}
