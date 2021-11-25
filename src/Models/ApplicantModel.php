<?php

namespace Portal\Models;

use Portal\Entities\BaseApplicantEntity;
use Portal\Entities\CompleteApplicantEntity;
use Portal\Interfaces\ApplicantModelInterface;

class ApplicantModel implements ApplicantModelInterface
{
    private $db;
    private $numberPerPage = 20;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    /**
     * Inserts new ApplicantEntity into database - registering.
     *
     * @param $applicant
     *
     * @return bool
     */
    public function storeApplicant(array $applicant)
    {
        $query = $this->db->prepare(
            "INSERT INTO `applicants` (
                            `name`,
                            `email`,
                            `phoneNumber`,                 
                            `whyDev`,
                            `codeExperience`,
                            `hearAboutId`,
                            `eligible`,
                            `eighteenPlus`,
                            `finance`,
                            `notes`,
                            `backgroundInfoId`
                            )
                        VALUES (
                            :name,
                            :email,
                            :phoneNumber,
                            :whyDev,
                            :codeExperience,
                            :hearAboutId,
                            :eligible,
                            :eighteenPlus,
                            :finance,
                            :notes,
                            :backgroundInfoId
                        );"
        );

        $query->bindValue(':name', $applicant['name']);
        $query->bindValue(':email', $applicant['email']);
        $query->bindValue(':phoneNumber', $applicant['phoneNumber']);
        $query->bindValue(':whyDev', $applicant['whyDev']);
        $query->bindValue(':codeExperience', $applicant['codeExperience']);
        $query->bindValue(':hearAboutId', $applicant['hearAboutId']);
        $query->bindValue(':eligible', $applicant['eligible']);
        $query->bindValue(':eighteenPlus', $applicant['eighteenPlus']);
        $query->bindValue(':finance', $applicant['finance']);
        $query->bindValue(':notes', $applicant['notes']);
        $query->bindValue(':backgroundInfoId', $applicant['backgroundInfoId']);

        $result = $query->execute();
        if ($result) {
            $id = $this->db->lastInsertId();
            foreach ($applicant['cohort'] as $cohortId) {
                $applicantModel = $this->db->prepare(
                    'INSERT INTO `course_choice` (`courseId`, `applicantId`) VALUES (?,?)'
                );
                $applicantModel->execute([$cohortId, $id]);
            }
            $applicantsAdditionalQuery = $this->db->prepare('INSERT INTO `applicants_additional` (`id`) VALUES (?)');
            return $applicantsAdditionalQuery->execute([$id]);
        }
        return $result;
    }

    /**
     * Counts number of applicants (depending on filters) and divides by number of applicants to be shown per page
     *
     * @param string $stageId
     * @param string $cohortId
     *
     * @return false|float
     */
    public function countPaginationPages(string $stageId = '%', string $cohortId = '%')
    {
        $count = "SELECT count(`applicants`.`id`) AS `id` FROM `applicants`
                  JOIN `course_choice` ON `applicants`.`id` = `course_choice`.`applicantId`
                    WHERE `applicants`.`deleted` = '0'
                    AND `course_choice`.`courseId` like :cohortId
                    AND `applicants`.`stageId` like :stageId;";
        $query = $this->db->prepare($count);
        $query->bindValue(':cohortId', $cohortId);
        $query->bindValue(':stageId', $stageId);
        $query->execute();
        return ceil($query->fetch()['id'] / $this->numberPerPage);
    }

    /**
     * Gets a sorted list of applicants assigned to a specific cohort and stage.
     * @param string $name
     * @param string $stageId the stage to filter by
     * @param string $cohortId the cohort to filer by
     * @param string $sortingQuery how you would like the results sorted
     *
     * @return array the data retrieved from the database
     */
    public function getApplicants(
        string $name = '%',
        string $stageId = '%',
        string $cohortId = '%',
        string $sortingQuery = '',
        string $pageNumber = '1'
    ) {
        $stmt = "SELECT `applicants`.`id`, `applicants`.`name`, `email`, `dateTimeAdded`,
        `applicants`.`stageId` as 'stageID', `title` as 'stageName', `option` as 'stageOptionName',
        `start_date` as 'chosenStartDate', `chosenCourseId`
                      FROM `applicants`
                      LEFT JOIN `stages` ON `applicants`.`stageId` = `stages`.`id`
                      LEFT JOIN `options` ON `applicants`.`stageOptionId` = `options`.`id`
                      LEFT JOIN `course_choice` ON `applicants`.`id`= `course_choice`.`applicantId`
                      LEFT JOIN `applicants_additional` ON `applicants`.`id`= `applicants_additional`.`id`
                      LEFT JOIN `courses` ON `applicants_additional`.`chosenCourseId`= `courses`.`id`
                      WHERE `applicants`.`deleted` = '0'
                        AND (`courseId`  like :cohortId OR `chosenCourseId`  like :cohortId2)
                        AND `applicants`.`name` like CONCAT('%', :name, '%')
                      AND `applicants`.`stageId` like :stageId 
                      GROUP BY `applicants`.`id`";
        $stmt .= $this->sortingQuery($sortingQuery);
        $stmt .= " LIMIT :offsets, :numberPerPage;";
        $offset = ($pageNumber - 1) * $this->numberPerPage;
        $query = $this->db->prepare($stmt);
        $query->setFetchMode(\PDO::FETCH_CLASS, BaseApplicantEntity::class);
        $query->bindValue(':name', $name);
        $query->bindValue(':stageId', $stageId);
        $query->bindValue(':cohortId', $cohortId);
        $query->bindValue(':cohortId2', $cohortId);
        $query->bindValue(':offsets', $offset, \PDO::PARAM_INT);
        $query->bindValue(':numberPerPage', $this->numberPerPage, \PDO::PARAM_INT);
        $query->execute();
        $applicants = $query->fetchAll();
        foreach ($applicants as $key => $applicant) {
            if (
                !empty($applicant->getChosenCourseId()) && $cohortId !== '%' &&
                $applicant->getChosenCourseId() !== $cohortId
            ) {
                //removes applicants where chosen applicants doesn't match filter
                unset($applicants[$key]);
                continue;
            }
            $queryDate = $this->db->prepare(
                'SELECT `start_date` FROM `courses` 
                        JOIN `course_choice` ON `courses`.`id` = `course_choice`.`courseId` 
                        WHERE `applicantId` = :id'
            );
            $queryDate->execute([
                'id' => $applicant->getId()
            ]);
            $cohorts = $queryDate->fetchAll();
            $applicant->setCohortDates($cohorts);
        }
        return $applicants;
    }

    /**
     * Sorts the table via the input taken from the sorting arrows
     *
     * @param string $sortingQuery - how you would like the results sorted
     * @return array $results is the data retrieved.
     */
    public function getAllStudents(string $sortingQuery = '') // @todo: only get applicants in a student stage
    {
        $stmt = "SELECT `applicants`.`id`, `applicants`.`name`, `email`, `dateTimeAdded`, `start_date` AS 'cohortDate', 
                      `applicants`.`stageId` as 'stageID', `title` as 'stageName', `option` as 'stageOptionName' 
                      FROM `applicants`
                      LEFT JOIN `courses` ON `applicants`.`cohortId` = `courses`.`id`
                      LEFT JOIN `stages` ON `applicants`.`stageId` = `stages`.`id`
                      LEFT JOIN `options` ON `applicants`.`stageOptionId` = `options`.`id`
                      WHERE `applicants`.`deleted` = '0' ";

        $stmt .= $this->sortingQuery($sortingQuery);

        $query = $this->db->prepare($stmt);
        $query->setFetchMode(\PDO::FETCH_CLASS, BaseApplicantEntity::class);

        $query->execute();

        return $query->fetchAll();
    }

    /**
     * Gets a sorted list of students assigned to a specific cohort.
     *
     * @param string $cohortId the cohort you would like the results of
     * @return array the data retrieved from the database
     */
    public function getAllStudentsByCohort(string $cohortId) // @todo: only get applicants in a student stage
    {
        $stmt = "SELECT `applicants`.`id`, `applicants`.`name`, `teams`.`trainer`, `team`
                      FROM `applicants`
                      LEFT JOIN `courses` ON `applicants`.`cohortId`=`courses`.`id`
                      LEFT JOIN `applicants_additional` ON `applicants`.`id` = `applicants_additional`.`id`
                      LEFT JOIN `teams` ON `applicants_additional`.`team` = `teams`.`id`
                      WHERE `applicants`.`deleted` = '0' AND `applicants`.`cohortId` = :cohortId;";

        $query = $this->db->prepare($stmt);
        $query->bindValue(':cohortId', $cohortId);
        $query->execute();

        return $query->fetchAll();
    }

    /**
     * Retrieves an Applicant with the specified id
     *
     * @param $id
     * @return object of applicant data
     */
    public function getApplicantById($id)
    {
        $query = $this->db->prepare(
            "SELECT `applicants`.`id`, `applicants`.`name`, `email`, `phoneNumber`, `whyDev`, `codeExperience`, 
                      `eligible`, `eighteenPlus`, `finance`, `applicants`.`notes`, `dateTimeAdded`, 
                      `backgroundInfo`, `hearAbout`, 
                      `apprentice`, `aptitude`,`events`.`date` AS 'assessmentDay', 
                      `applicants_additional`.`customAssessmentDay`, `assessmentTime`,
                      `assessmentNotes`, `diversitechInterest`, `diversitech`, `edaid`, `upfront`, `kitCollectionDay`,
                      `kitCollectionTime`, `kitNum`, `laptop`, `laptopDeposit`, `laptopNum`, 
                      `tasterEvent`.`date` AS `taster`, `tasterId`,
                      `tasterAttendance`, `teams`.`trainer` AS 'team', `hearAboutId`, `backgroundInfoId`,
                      `applicants`.`stageId` as 'stageID', `title` as 'stageName', 
                      `stages`.`student` AS 'isStudentStage',
                      `option` as 'stageOptionName', `githubUsername`, `portfolioUrl`, `pleskHostingUrl`,
                      `githubEducationLink`, `additionalNotes`, `student_course`.`start_date` AS 'chosenCourseDate',
                      `applicants_additional`.`chosenCourseId` AS 'chosenCourseId',
                      `attitude`, `averageScore`, `fee`, `signedTerms`, `signedDiversitech`,
                      `inductionEmailSent`, `signedNDA`, `checkedID`,
                      `dataProtectionName`, `dataProtectionPhoto`, 
                      `dataProtectionTestimonial`, `dataProtectionBio`, `dataProtectionVideo`
                        FROM `applicants` 
                        LEFT JOIN `hear_about` 
                            ON `applicants`.`hearAboutId` = `hear_about`.`id`
                        LEFT JOIN `background_info` 
                            ON `applicants`.`backgroundInfoId` = `background_info`.`id` 
                        LEFT JOIN `applicants_additional`
                            ON `applicants`.`id` = `applicants_additional`.`id`
                        LEFT JOIN `events` AS `tasterEvent`
                            ON `applicants_additional`.`tasterId` = `tasterEvent`.`id`
                        LEFT JOIN `teams` 
                            ON `applicants_additional`.`team` = `teams`.`id`
                        LEFT JOIN `courses` student_course 
                            ON `applicants_additional`.`chosenCourseId` = `student_course`.`id` 
                        LEFT JOIN `stages`
                            ON `applicants`.`stageId` = `stages`.`id`
                        LEFT JOIN `options` 
                            ON `applicants`.`stageOptionId` = `options`.`id`
                        LEFT JOIN `events`
                            ON `applicants_additional`.`assessmentDay` = `events`.`id`
                        WHERE `applicants`.`id`= :id;"
        );
        $query->setFetchMode(\PDO::FETCH_CLASS, CompleteApplicantEntity::class);
        $query->execute([
            'id' => $id
        ]);
        $results = $query->fetch();

        $queryDate = $this->db->prepare(
            'SELECT `courses`.`id` as "id", `start_date` 
                    FROM `courses` JOIN `course_choice` ON `courses`.`id` = `course_choice`.`courseId` 
                    WHERE `applicantId` = :id'
        );
        $queryDate->execute([
            'id' => $id
        ]);
        $applicantCohortDate = $queryDate->fetchAll();
        $results->setCohortDates($applicantCohortDate);
        return $results;
    }

    /**
     * Deletes record with the given id from the database
     *
     * @param $id
     *
     * @return boolean for success or failure of the query
     */
    public function deleteApplicant($id)
    {
        $query = $this->db->prepare("UPDATE `applicants` SET `deleted` = '1' WHERE `id` = :id");
        $query->bindParam(':id', $id);
        return $query->execute();
    }

    /**
     * Generates an SQL query used for sorting the data.
     *
     * @param string $sortingQuery how you would like to sort the database
     * @return string the SQL statement used for sorting
     */
    private function sortingQuery(string $sortingQuery = ''): string
    {
        $stmt = "ORDER BY ";
        switch ($sortingQuery) {
            case 'dateAsc':
                $stmt .= '`dateTimeAdded` ASC';
                break;

            case 'dateDesc':
                $stmt .= '`dateTimeAdded` DESC';
                break;

            case 'cohortAsc':
                $stmt .= '`start_date` ASC';
                break;

            case 'cohortDesc':
                $stmt .= '`start_date` DESC';
                break;

            default:
                $stmt .= '`dateTimeAdded` ASC';
                break;
        }
        return $stmt;
    }

    /**
     * updateApplicant updates the applicant data.
     *
     * @param array $applicant
     * @return bool
     */
    public function updateApplicant(array $applicant): bool
    {
        $query = $this->db->prepare(
            "UPDATE `applicants`
                        SET 
                            `name` = :name,
                            `email` = :email,
                            `phoneNumber` = :phoneNumber,
                            `whyDev` = :whyDev,
                            `codeExperience` = :codeExperience,
                            `hearAboutId` = :hearAboutId,
                            `eligible` = :eligible,
                            `eighteenPlus` = :eighteenPlus,
                            `finance` = :finance,
                            `notes` = :notes,
                            `stageId` = :stageId,
                            `stageOptionId` = :stageOptionId,
                            `dateTimeAdded` = :dateTimeAdded,
                            `backgroundInfoId` = :backgroundInfoId
                        WHERE (
                            `id` = :id
                        );"
        );

        $query->bindValue(':name', $applicant['name']);
        $query->bindValue(':email', $applicant['email']);
        $query->bindValue(':phoneNumber', $applicant['phoneNumber']);
        $query->bindValue(':whyDev', $applicant['whyDev']);
        $query->bindValue(':codeExperience', $applicant['codeExperience']);
        $query->bindValue(':hearAboutId', $applicant['hearAboutId']);
        $query->bindValue(':eligible', $applicant['eligible']);
        $query->bindValue(':eighteenPlus', $applicant['eighteenPlus']);
        $query->bindValue(':finance', $applicant['finance']);
        $query->bindValue(':notes', $applicant['notes']);
        $query->bindValue(':id', $applicant['id']);
        $query->bindValue(':stageId', $applicant['stageId']);
        $query->bindValue(':stageOptionId', $applicant['stageOptionId']);
        $query->bindValue(':dateTimeAdded', $applicant['dateTimeAdded']);
        $query->bindValue(':backgroundInfoId', $applicant['backgroundInfoId']);
        $deleteQuery = $this->db->prepare('DELETE FROM `course_choice` WHERE `applicantId` = ?');
        $deleteQuery->execute([$applicant['id']]);
        foreach ($applicant['cohort'] as $cohortId) {
            $updateCourseDate = $this->db->prepare(
                'INSERT INTO `course_choice` (`courseId`, `applicantId`) VALUES (?,?)'
            );
            $updateCourseDate->execute([$cohortId, $applicant['id']]);
        }
        return $query->execute();
    }

    /**
     * updateApplicant updates the applicant data.
     *
     * @param array $applicant
     * @return bool
     */
    public function updateApplicantAdditionalFields(array $applicant)
    {
        $query = $this->db->prepare(
            "UPDATE `applicants_additional`
                        SET 
                            `apprentice` = :apprentice,
                            `aptitude` = :aptitude,
                            `assessmentDay` = :assessmentDay,
                            `customAssessmentDay` = :customAssessmentDay,
                            `assessmentTime` = :assessmentTime,
                            `assessmentNotes` = :assessmentNotes,
                            `diversitechInterest` = :diversitechInterest,
                            `diversitech` = :diversitech,
                            `edaid` = :edaid,
                            `upfront` = :upfront,
                            `kitCollectionDay` = :kitCollectionDay,
                            `kitCollectionTime` = :kitCollectionTime,
                            `kitNum` = :kitNum,
                            `laptop` = :laptop,
                            `laptopDeposit` = :laptopDeposit,
                            `laptopNum` = :laptopNum,
                            `tasterId` = :taster,
                            `tasterAttendance` = :tasterAttendance,
                            `githubUsername` = :githubUsername,
                            `portfolioUrl` = :portfolioUrl,
                            `pleskHostingUrl` = :pleskHostingUrl,
                            `githubEducationLink` = :githubEducationLink,
                            `additionalNotes` = :additionalNotes,
                            `chosenCourseId` = :chosenCourseId,
                            `attitude` = :attitude,
                            `averageScore` = :averageScore,
                            `fee` = :fee,
                            `signedTerms` = :signedTerms,
                            `signedDiversitech` = :signedDiversitech,
                            `signedNDA` = :signedNDA,
                            `inductionEmailSent` = :inductionEmailSent,
                            `checkedID` = :checkedID,
                            `contactFormSigned` = :contactFormSigned,
                            `dataProtectionName` = :dataProtectionName,
                            `dataProtectionPhoto` = :dataProtectionPhoto,
                            `dataProtectionTestimonial` = :dataProtectionTestimonial,
                            `dataProtectionBio` = :dataProtectionBio,
                            `dataProtectionVideo` = :dataProtectionVideo
                        WHERE (
                            `id` = :id
                        );"
        );

        $query->bindValue(':apprentice', $applicant['apprentice']);
        $query->bindValue(':aptitude', $applicant['aptitude']);
        $query->bindValue(':assessmentDay', $applicant['assessmentDay']);
        $query->bindValue(':customAssessmentDay', $applicant['customAssessmentDay']);
        $query->bindValue(':assessmentTime', $applicant['assessmentTime']);
        $query->bindValue(':assessmentNotes', $applicant['assessmentNotes']);
        $query->bindValue(':diversitechInterest', $applicant['diversitechInterest']);
        $query->bindValue(':diversitech', $applicant['diversitech']);
        $query->bindValue(':edaid', $applicant['edaid']);
        $query->bindValue(':upfront', $applicant['upfront']);
        $query->bindValue(':kitCollectionDay', $applicant['kitCollectionDay']);
        $query->bindValue(':kitCollectionTime', $applicant['kitCollectionTime']);
        $query->bindValue(':kitNum', $applicant['kitNum']);
        $query->bindValue(':laptop', $applicant['laptop']);
        $query->bindValue(':laptopDeposit', $applicant['laptopDeposit']);
        $query->bindValue(':laptopNum', $applicant['laptopNum']);
        $query->bindValue(':taster', $applicant['taster']);
        $query->bindValue(':tasterAttendance', $applicant['tasterAttendance']);
        $query->bindValue(':githubUsername', $applicant['githubUsername']);
        $query->bindValue(':portfolioUrl', $applicant['portfolioUrl']);
        $query->bindValue(':pleskHostingUrl', $applicant['pleskHostingUrl']);
        $query->bindValue(':githubEducationLink', $applicant['githubEducationLink']);
        $query->bindValue(':additionalNotes', $applicant['additionalNotes']);
        $query->bindValue(':chosenCourseId', $applicant['chosenCourseId']);
        $query->bindValue(':id', $applicant['id']);
        $query->bindValue(':attitude', $applicant['attitude']);
        $query->bindValue(':averageScore', $applicant['averageScore']);
        $query->bindValue(':fee', $applicant['fee']);
        $query->bindValue(':signedTerms', $applicant['signedTerms']);
        $query->bindValue(':signedDiversitech', $applicant['signedDiversitech']);
        $query->bindValue(':signedNDA', $applicant['signedNDA']);
        $query->bindValue(':inductionEmailSent', $applicant['inductionEmailSent']);
        $query->bindValue(':checkedID', $applicant['checkedID']);
        $query->bindValue(':contactFormSigned', $applicant['contactFormSigned']);
        $query->bindValue(':dataProtectionName', $applicant['dataProtectionName']);
        $query->bindValue(':dataProtectionPhoto', $applicant['dataProtectionPhoto']);
        $query->bindValue(':dataProtectionTestimonial', $applicant['dataProtectionTestimonial']);
        $query->bindValue(':dataProtectionBio', $applicant['dataProtectionBio']);
        $query->bindValue(':dataProtectionVideo', $applicant['dataProtectionVideo']);

        return $query->execute();
    }

    public function addApplicantPassword(string $password, int $applicantId): bool
    {
        $sql = 'UPDATE `applicants` SET `profile_password` = :password WHERE `id` = :applicantId';
        $query = $this->db->prepare($sql);
        return $query->execute([':password' => $password, ':applicantId' => $applicantId]);
    }


    public function getApplicantPassword(int $applicantId): string
    {
        $sql = 'SELECT `profile_password` FROM `applicants` WHERE `id` = :applicantId';
        $query = $this->db->prepare($sql);
        $query->execute([':applicantId' => $applicantId]);
        return $query->fetch(\PDO::FETCH_COLUMN, 0);
    }

    public function addApplicantToTeam(int $teamId, int $applicantId): bool
    {
        $sql = 'UPDATE `applicants_additional` SET `team` = :teamId WHERE `id` = :applicantId';
        $query = $this->db->prepare($sql);
        return $query->execute([':teamId' => $teamId, ':applicantId' => $applicantId]);
    }

    public function getApplicantStageId(int $applicantId): string
    {
        $query = $this->db->prepare('SELECT `stageId` FROM `applicants` WHERE `id` = :applicantId');
        $query->execute([':applicantId' => $applicantId]);
        return $query->fetch(\PDO::FETCH_COLUMN, 0);
    }

    public function updateApplicantStageAndOptionIds(int $applicantId, int $stageId, ?int $optionId): bool
    {
        $query = $this->db->prepare(
            "UPDATE `applicants` SET `stageId` = :stageId, `stageOptionId` = :optionId WHERE `id` = :applicantId"
        );
        return $query->execute([':applicantId' => $applicantId, ':stageId' => $stageId, ':optionId' => $optionId]);
    }

    public function getAssessmentApplicants(): array
    {
        $stmt = "SELECT `applicants`.`id`, `applicants`.`name`, `applicants`.`email`, 
                    `applicants_additional`.`assessmentDay` 
                FROM `applicants` INNER JOIN `applicants_additional` 
                ON `applicants`.`id`=`applicants_additional`.`id`;";
        $query = $this->db->prepare($stmt);
        $query->execute();
        return $query->fetchAll();
    }
}
