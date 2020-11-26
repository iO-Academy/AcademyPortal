<?php

namespace Portal\Models;

use Portal\Entities\BaseApplicantEntity;
use Portal\Entities\CompleteApplicantEntity;
use Portal\Interfaces\ApplicantEntityInterface;
use Portal\Interfaces\ApplicantModelInterface;

class ApplicantModel implements ApplicantModelInterface
{
    private $db;

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
    public function storeApplicant(ApplicantEntityInterface $applicant)
    {
        $query = $this->db->prepare(
            "INSERT INTO `applicants` (
                            `name`,
                            `email`,
                            `phoneNumber`,
                            `cohortId`,
                            `whyDev`,
                            `codeExperience`,
                            `hearAboutId`,
                            `eligible`,
                            `eighteenPlus`,
                            `finance`,
                            `notes`
                            )
                        VALUES (
                            :name,
                            :email,
                            :phoneNumber,
                            :cohortId,
                            :whyDev,
                            :codeExperience,
                            :hearAboutId,
                            :eligible,
                            :eighteenPlus,
                            :finance,
                            :notes
                        );"
        );

        $query->bindValue(':name', $applicant->getName());
        $query->bindValue(':email', $applicant->getEmail());
        $query->bindValue(':phoneNumber', $applicant->getPhoneNumber());
        $query->bindValue(':cohortId', $applicant->getCohortId());
        $query->bindValue(':whyDev', $applicant->getWhyDev());
        $query->bindValue(':codeExperience', $applicant->getCodeExperience());
        $query->bindValue(':hearAboutId', $applicant->getHearAboutId());
        $query->bindValue(':eligible', $applicant->getEligible());
        $query->bindValue(':eighteenPlus', $applicant->getEighteenPlus());
        $query->bindValue(':finance', $applicant->getFinance());
        $query->bindValue(':notes', $applicant->getNotes());

        $result = $query->execute();
        if ($result) {
            $id = $this->db->lastInsertId();
            $query2 = $this->db->prepare('INSERT INTO `student_info` (`id`) VALUES (?)');
            return $query2->execute([$id]);
        }
        return $result;
    }

    /**
     * Gets a sorted list of applicants assigned to a specific cohort and stage.
     *
     * @param string $stageId       the stage to filter by
     * @param string $cohortId      the cohort to filer by
     * @param string $sortingQuery  how you would like the results sorted
     *
     * @return array the data retrieved from the database
     */
    public function getApplicants(string $stageId = '%', string $cohortId = '%', string $sortingQuery = '')
    {
        $stmt = "SELECT `applicants`.`id`, `name`, `email`, `dateTimeAdded`, `date` AS 'cohortDate', 
                      `applicants`.`stageId` as 'stageID', `title` as 'stageName', `option` as 'stageOptionName' 
                      FROM `applicants`
                      LEFT JOIN `cohorts` ON `applicants`.`cohortId`=`cohorts`.`id`
                      LEFT JOIN `stages` ON `applicants`.`stageId` = `stages`.`id`
                      LEFT JOIN `options` ON `applicants`.`stageOptionId` = `options`.`id`
                      WHERE `applicants`.`deleted` = '0'
                      AND `applicants`.`cohortId` like :cohortId
                      AND `applicants`.`stageId` like :stageId; ";

        $stmt .= $this->sortingQuery($sortingQuery);

        $query = $this->db->prepare($stmt);
        $query->setFetchMode(\PDO::FETCH_CLASS, BaseApplicantEntity::class);
        $query->bindValue(':cohortId', $cohortId);
        $query->bindValue(':stageId', $stageId);
        $query->execute();

        return $query->fetchAll();
    }

    /**
     * Sorts the table via the input taken from the sorting arrows
     *
     * @param string $sortingQuery - how you would like the results sorted
     * @return array $results is the data retrieved.
     */
    public function getAllStudents(string $sortingQuery = '') // @todo: only get applicants in a student stage
    {
        $stmt = "SELECT `applicants`.`id`, `name`, `email`, `dateTimeAdded`, `date` AS 'cohortDate', 
                      `applicants`.`stageId` as 'stageID', `title` as 'stageName', `option` as 'stageOptionName' 
                      FROM `applicants`
                      LEFT JOIN `cohorts` ON `applicants`.`cohortId`=`cohorts`.`id`
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
        $stmt = "SELECT `applicants`.`id`, `name`, `trainer`, `team`
                      FROM `applicants`
                      LEFT JOIN `cohorts` ON `applicants`.`cohortId`=`cohorts`.`id`
                      LEFT JOIN `student_info` ON `applicants`.`id` = `student_info`.`id`
                      LEFT JOIN `teams` ON `student_info`.`team` = `teams`.`id`
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
            "SELECT `applicants`.`id`, `name`, `email`, `phoneNumber`, `whyDev`, `codeExperience`, 
                      `eligible`, `eighteenPlus`, `finance`, `notes`, `dateTimeAdded`,  `hearAbout`, 
                      `date` AS 'cohortDate', `apprentice`, `aptitude`, `assessmentDay`, `assessmentTime`,
                      `assessmentNotes`, `diversitechInterest`, `diversitech`, `edaid`, `upfront`, `kitCollectionDay`,
                      `kitCollectionTime`, `kitNum`, `laptop`, `laptopDeposit`, `laptopNum`, `taster`, 
                      `tasterAttendance`, `trainer` AS 'team', `cohortId`, `hearAboutId`, 
                      `applicants`.`stageId` as 'stageID', `title` as 'stageName',
                       `option` as 'stageOptionName', `githubEduLink`, `githubUserName`, `portfolioUrl`, `pleskUrl`,
                       `pleskUsername`, `pleskPassword`, `additionalNotes`, 
                       `confirmedCourseDate` as 'hasConfirmedCourseDate', `chosenCourseDate` 
                        FROM `applicants` 
                        LEFT JOIN `cohorts` 
                            ON `applicants`.`cohortId`=`cohorts`.`id` 
                        LEFT JOIN `hear_about` 
                            ON `applicants`.`hearAboutId`=`hear_about`.`id` 
                        LEFT JOIN `student_info`
                            ON `applicants`.`id` = `student_info`.`id`
                        LEFT JOIN `teams` 
                            ON `student_info`.`team` = `teams`.`id`
                        LEFT JOIN `stages`
                            ON `applicants`.`stageId` = `stages`.`id`
                        LEFT JOIN `options` 
                            ON `applicants`.`stageOptionId` = `options`.`id`
                        WHERE `applicants`.`id`= :id;"
        );
        $query->setFetchMode(\PDO::FETCH_CLASS, CompleteApplicantEntity::class);
        $query->execute([
            'id' => $id
        ]);
        $results = $query->fetch();
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
                $stmt .= '`date` ASC';
                break;

            case 'cohortDesc':
                $stmt .= '`date` DESC';
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
     * @param ApplicantEntityInterface $applicant
     * @return bool
     */
    public function updateApplicant(ApplicantEntityInterface $applicant)
    {
        $query = $this->db->prepare(
            "UPDATE `applicants`
                        SET 
                            `apprentice` = :apprentice,
                            `aptitude` = :aptitude,
                            `assessmentDay` = :assessmentDay,
                            `assessmentTime` = :assessmentTime,
                            `assessmentNotes` = :assessmentNotes,
                            `name` = :name,
                            `email` = :email,
                            `phoneNumber` = :phoneNumber,
                            `cohortId` = :cohortId,
                            `whyDev` = :whyDev,
                            `codeExperience` = :codeExperience,
                            `hearAboutId` = :hearAboutId,
                            `eligible` = :eligible,
                            `eighteenPlus` = :eighteenPlus,
                            `finance` = :finance,
                            `notes` = :notes,
                            `stageId` = :stageId,
                            `stageOptionId` = :stageOptionId
                            `taster` = :taster,
                            `tasterAttendance` = :tasterAttendance
                        WHERE (
                            `id` = :id
                        );"
        );

        $query->bindValue(':name', $applicant['name']);
        $query->bindValue(':apprentice', $applicant['apprentice']);
        $query->bindValue(':aptitude', $applicant['aptitude']);
        $query->bindValue(':assessmentDay', $applicant['assessmentDay']);
        $query->bindValue(':assessmentTime', $applicant['assessmentTime']);
        $query->bindValue(':assessmentNotes', $applicant['assessmentNotes']);
        $query->bindValue(':email', $applicant['email']);
        $query->bindValue(':phoneNumber', $applicant['phoneNumber']);
        $query->bindValue(':cohortId', $applicant['cohortId']);
        $query->bindValue(':whyDev', $applicant['whyDev']);
        $query->bindValue(':codeExperience', $applicant['codeExperience']);
        $query->bindValue(':hearAboutId', $applicant['hearAboutId']);
        $query->bindValue(':eligible', $applicant['eligible']);
        $query->bindValue(':eighteenPlus', $applicant['eighteenPlus']);
        $query->bindValue(':finance', $applicant['finance']);
        $query->bindValue(':notes', $applicant['notes']);
        $query->bindValue(':id', $applicant['id']);
        $query->bindValue(':stageId', $applicant['stageId']);
        $query->bindValue(':stageOptionId', $applicant['optionId']);
        $query->bindValue(':taster', $applicant['taster']);
        $query->bindValue(':tasterAttendance', $applicant['tasterAttendance']);

        return $query->execute();
    }

    /**
     * updateApplicant updates the applicant data.
     *
     * @param ApplicantEntityInterface $applicant
     * @return bool
     */
    public function updateApplicantAdditionalFields(CompleteApplicantEntity $applicant)
    {
        $query = $this->db->prepare(
            "UPDATE `student_info`
                        SET 
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
                            `githubEduLink` = :githubEdulink,
                            `githubUserName` = :githubUserName,
                            `portfolioUrl` = :portfolioUrl,
                            `pleskUrl` = :pleskUrl,
                            `pleskUsername` = :pleskUsername,
                            `pleskPassword` = :pleskPassword,
                            `additionalNotes` = :additionalNotes,
                            `confirmedCourseDate` = :hasConfirmedCourseDate,
                            `chosenCourseDate` = :chosenCourseDate
                        WHERE (
                            `id` = :id
                        );"
        );

        $query->bindValue(':diversitechInterest', $applicant->getDiversitechInterest());
        $query->bindValue(':diversitech', $applicant->getDiversitech());
        $query->bindValue(':edaid', $applicant->getEdaid());
        $query->bindValue(':upfront', $applicant->getUpfront());
        $query->bindValue(':kitCollectionDay', $applicant->getKitCollectionDay());
        $query->bindValue(':kitCollectionTime', $applicant->getKitCollectionTime());
        $query->bindValue(':kitNum', $applicant->getKitNum());
        $query->bindValue(':laptop', $applicant->getLaptop());
        $query->bindValue(':laptopDeposit', $applicant->getLaptopDeposit());
        $query->bindValue(':laptopNum', $applicant->getLaptopNum());
        $query->bindValue(':id', $applicant->getId());

        return $query->execute();
    }

    public function addApplicantToTeam(int $teamId, int $applicantId)
    {
        $sql = 'UPDATE `student_info` SET `team` = :teamId WHERE `id` = :applicantId';
        $query = $this->db->prepare($sql);
        return $query->execute([':teamId' => $teamId, ':applicantId' => $applicantId]);
    }

    public function getApplicantStageId(int $applicantId)
    {
        $query = $this->db->prepare(
            'SELECT `stageId` FROM `applicants` WHERE `id` = :applicantId'
        );
        $query->execute([':applicantId' => $applicantId]);
        return $query->fetch();
    }

    public function updateApplicantStageId(int $stageId, int $applicantId)
    {
        $query = $this->db->prepare("UPDATE `applicants` SET `stageId` = :stageId WHERE `id` = :applicantId");
        return $query->execute([':applicantId' => $applicantId, ':stageId' => $stageId]);
    }
}
