<?php

namespace Portal\Models;

use mysql_xdevapi\Warning;
use PDO;
use Portal\Entities\CalendarCourseEntity;
use Portal\Entities\CourseEntity;
use Portal\Entities\CompleteCourseEntity;

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

    public function getCourseByID($id): CourseEntity
    {
        $sql = 'SELECT `id`,
        `start_date` AS `startDate`,
        `end_date`AS `endDate`,
        `name`,
        `notes`,
        `in_person` AS `inPerson`,
        `remote`,
        `in_person_spaces` AS `inPersonSpaces`,
        `remote_spaces` AS `remoteSpaces`,
        `category_id` AS `categoryId`
        FROM `courses` WHERE `id` = :id';
        $query = $this->db->prepare($sql);
        $query->bindParam('id', $id);
        $query->setFetchMode(\PDO::FETCH_CLASS, CourseEntity::class);
        $query->execute();
        return $query->fetch();
    }

    /**
     * Gets all courses from the database that have a start date in the future. Sorted by the category selected.
     */
    public function getFutureCourses(string $category, string $sortColumn): array
    {
        $sql = "SELECT `c`.`id`,
        `start_date` AS `startDate`,
        `end_date` AS `endDate`,
        `name`,
        `notes`,
        `in_person` AS `inPerson`,
        `remote`,
        `in_person_spaces` AS `inPersonSpaces`,
        `remote_spaces` AS `remoteSpaces`,
        `course_categories`.`category`,
        `in_person_spaces` + `remote_spaces` AS `totalAvailableSpaces`,
        COUNT(`applicantId`) AS `spacesTaken`
        FROM `courses` `c`
        LEFT JOIN `course_choice` `cc` ON `c`.`id` = `cc`.`courseId`
        LEFT JOIN `course_categories` ON `c`.`category_id` = `course_categories`.`id`
        WHERE `c`.`deleted` = 0 AND `c`.`start_date` > NOW() AND `course_categories`.`category` LIKE :category
        GROUP BY `c`.`id` ORDER BY $sortColumn;";

        $query = $this->db->prepare($sql);
        $query->bindParam(':category', $category);
        $query->setFetchMode(\PDO::FETCH_CLASS, CompleteCourseEntity::class);
        $query->execute();
        return $query->fetchAll();
    }

    /**
     * Gets all courses from the database that are ongoing (i.e. have a start date in the past, end date in the future).
     * Sorted by the category selected.
     */
    public function getOngoingCourses(string $category, string $sortColumn): array
    {
        $sql = "SELECT `c`.`id`,
        `start_date` AS `startDate`,
        `end_date` AS `endDate`,
        `name`,
        `notes`,
        `in_person` AS `inPerson`,
        `remote`,
        `in_person_spaces` AS `inPersonSpaces`,
        `remote_spaces` AS `remoteSpaces`,
       `course_categories`.`category`,
        `in_person_spaces` + `remote_spaces` AS `totalAvailableSpaces`,
        COUNT(`applicantId`) AS `spacesTaken`
        FROM `courses` `c`
        LEFT JOIN `course_choice` `cc` ON `c`.`id` = `cc`.`courseId`
        LEFT JOIN `course_categories` ON `c`.`category_id` = `course_categories`.`id`
        WHERE `c`.`deleted` = 0 AND `c`.`start_date` <= NOW() AND `c`.`end_date` >= NOW() AND `course_categories`.`category` LIKE :category
        GROUP BY `c`.`id`
        ORDER BY $sortColumn;";

        $query = $this->db->prepare($sql);
        $query->bindParam(':category', $category);
        $query->setFetchMode(\PDO::FETCH_CLASS, CompleteCourseEntity::class);
        $query->execute();
        return $query->fetchAll();
    }

    public function getCompletedCourses(string $category, string $sortColumn): array
    {
        $sql = "SELECT `c`.`id`,
        `start_date` AS `startDate`,
        `end_date` AS `endDate`,
        `name`,
        `notes`,
        `in_person` AS `inPerson`,
        `remote`,
        `in_person_spaces` AS `inPersonSpaces`,
        `remote_spaces` AS `remoteSpaces`,
        `course_categories`.`category`,
        `in_person_spaces` + `remote_spaces` AS `totalAvailableSpaces`,
        COUNT(`applicantId`) AS `spacesTaken`
        FROM `courses` `c`
        LEFT JOIN `course_choice` `cc` ON `c`.`id` = `cc`.`courseId`
        LEFT JOIN `course_categories` ON `c`.`category_id` = `course_categories`.`id`
        WHERE `c`.`deleted` = 0 AND `c`.`end_date` < NOW() AND `course_categories`.`category` LIKE :category
        GROUP BY `c`.`id`
        ORDER BY $sortColumn;";
        $query = $this->db->prepare($sql);
        $query->bindParam(':category', $category);
        $query->setFetchMode(\PDO::FETCH_CLASS, CompleteCourseEntity::class);
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
            `remote`,
            `in_person_spaces`,
            `remote_spaces`,
            `category_id`
            ) 
            VALUES (
            :startDate, 
            :endDate, 
            :name,
            :notes,
            :in_person,
            :remote,
            :in_person_spaces,
            :remote_spaces,
            :courseCategory);");
        $query->bindParam(':startDate', $newCourse['startDate']);
        $query->bindParam(':endDate', $newCourse['endDate']);
        $query->bindParam(':name', $newCourse['courseName']);
        $query->bindParam(':notes', $newCourse['notes']);
        $query->bindParam(':in_person', $newCourse['in_person']);
        $query->bindParam(':remote', $newCourse['remote']);
        $query->bindParam(':in_person_spaces', $newCourse['in_person_spaces']);
        $query->bindParam(':remote_spaces', $newCourse['remote_spaces']);
        $query->bindParam(':courseCategory', $newCourse['courseCategory']);
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

    public function getTrainersIdByCourseId($courseId): array
    {
        $query = $this->db->prepare(
            'SELECT `trainer_id` FROM `courses_trainers` WHERE `course_id` = :courseId'
        );
        $query->bindParam(':courseId', $courseId);
        $query->execute();
        return $query->fetchAll();
    }

    public function getCategories(): array
    {
        $sql = 'SELECT `id`,
                `category`,
                `deleted`
                FROM `course_categories`
                WHERE `course_categories`.`deleted` = 0
                ;';
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public function addCategory(array $newCategory): string
    {
        $query = $this->db->prepare("INSERT INTO `course_categories` (
            `category`
            ) 
            VALUES (
            :courseCategory);");
        $query->bindParam(':courseCategory', $newCategory['courseCategory']);
        $query->execute();
        return $this->db->lastInsertId();
    }

    public function deleteCategory(int $deletedCategory): bool
    {
        $sql = 'UPDATE `course_categories`
                SET `deleted` = 1
                WHERE `id` = :id;';
        $query = $this->db->prepare($sql);
        $query->bindParam(':id', $deletedCategory);
        return $query->execute();
    }

    public function updateCourse(array $course): bool
    {
        $query = $this->db->prepare(
            "UPDATE `courses` 
                SET
                    `start_date` = :start_date,
                    `end_date` = :end_date,
                    `name` = :name,
                    `notes` = :notes,
                    `in_person` = :in_person,
                    `remote` = :remote,
                    `in_person_spaces` = :in_person_spaces,
                    `remote_spaces` = :remote_spaces,
                    `category_id` = :category_id
                WHERE `id` = :id"
        );

        $query->bindValue(':start_date', $course['startDate']);
        $query->bindValue(':end_date', $course['endDate']);
        $query->bindValue(':name', $course['courseName']);
        $query->bindValue(':notes', $course['notes']);
        $query->bindValue(':in_person', $course['in_person']);
        $query->bindValue(':remote', $course['remote']);
        $query->bindValue(':in_person_spaces', $course['in_person_spaces']);
        $query->bindValue(':remote_spaces', $course['remote_spaces']);
        $query->bindValue(':category_id', $course['courseCategory']);
        $query->bindValue(':id', $course['id']);
        return $query->execute();
    }

    public function getApplicantsByCourse(int $courseId): array
    {
        $query = $this->db->prepare("SELECT `name`, applicants.`id` FROM `applicants` INNER JOIN `course_choice` 
        ON `applicantId` = applicants.`id` WHERE `courseId` = :id");
        $query->bindParam(':id', $courseId);
        $query->execute();
        return $query->fetchAll();
    }

    public function getAllCoursesExceptOne(int $courseId): array
    {
        $query = $this->db->prepare("SELECT `name`, `start_date`, `id` FROM `courses` WHERE `deleted` = 0
                                    AND `id` != :id");
        $query->bindParam(':id', $courseId);
        $query->execute();
        return $query->fetchAll();
    }

    public function reassignApplicantsToNewCourse(int $courseId, int $applicantId): bool
    {
        $query = $this->db->prepare("UPDATE `course_choice` SET `courseId` = :courseId
                                    WHERE `applicantId` = :applicantId");
        $query->bindParam(':courseId', $courseId);
        $query->bindParam(':applicantId', $applicantId);
        return $query->execute();
    }

    public function unassignApplicantFromCourse(int $courseId, int $applicantId): bool
    {
        $query = $this->db->prepare("DELETE FROM `course_choice` WHERE `courseId` = :courseId
                                    AND `applicantId` = :applicantId");
        $query->bindParam(':courseId', $courseId);
        $query->bindParam(':applicantId', $applicantId);
        return $query->execute();
    }

    public function deleteCourse(int $courseId): bool
    {
        $query = $this->db->prepare("UPDATE `courses` SET `deleted` = 1 WHERE `id` = :courseId");
        $query->bindParam(':courseId', $courseId);
        return $query->execute();
    }

    public function getCoursesForCalendar(): array
    {
        $sql = 'SELECT `courses`.`id`,
               `courses`.`start_date` AS `startDate`,
               `courses`.`end_date` AS `endDate`,
               `name` AS `title`,
               `course_categories`.`category` AS `categoryName`
                FROM `courses`
                INNER JOIN `course_categories` ON `courses`.`category_id` = `course_categories`.`id`';
        $query = $this->db->prepare($sql);
        $query->setFetchMode(\PDO::FETCH_CLASS, CalendarCourseEntity::class);
        $query->execute();
        return $query->fetchAll();
    }
}
