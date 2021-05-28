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
                            `cohortId`,
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
                            :cohortId,
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
        $query->bindValue(':cohortId', $applicant['cohortId']);
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
            $query2 = $this->db->prepare('INSERT INTO `applicants_additional` (`id`) VALUES (?)');
            return $query2->execute([$id]);
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
        $count = "SELECT count(`id`) AS `id` FROM `applicants` 
                    WHERE `applicants`.`deleted` = '0'
                    AND `applicants`.`cohortId` like :cohortId
                    AND `applicants`.`stageId` like :stageId;";
        $query = $this->db->prepare($count);
        $query->bindValue(':cohortId', $cohortId);
        $query->bindValue(':stageId', $stageId);
        $query->execute();
        return ceil($query->fetch()['id'] / $this->numberPerPage);
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
    public function getApplicants(
        string $stageId = '%',
        string $cohortId = '%',
        string $sortingQuery = '',
        string $pageNumber = '1'
    ) {
        $stmt = "SELECT `applicants`.`id`, `applicants`.`name`, `email`, `dateTimeAdded`, `start_date` AS 'cohortDate', 
                      `applicants`.`stageId` as 'stageID', `title` as 'stageName', `option` as 'stageOptionName' 
                      FROM `applicants`
                      LEFT JOIN `courses` ON `applicants`.`cohortId`=`courses`.`id`
                      LEFT JOIN `stages` ON `applicants`.`stageId` = `stages`.`id`
                      LEFT JOIN `options` ON `applicants`.`stageOptionId` = `options`.`id`
                      WHERE `applicants`.`deleted` = '0'
                      AND `applicants`.`cohortId` like :cohortId
                      AND `applicants`.`stageId` like :stageId ";

        $stmt .= $this->sortingQuery($sortingQuery);
        $stmt .= " LIMIT :offsets, :numberPerPage;";
        $offset = ($pageNumber - 1) * $this->numberPerPage;
        $query = $this->db->prepare($stmt);
        $query->setFetchMode(\PDO::FETCH_CLASS, BaseApplicantEntity::class);
        $query->bindValue(':cohortId', $cohortId);
        $query->bindValue(':stageId', $stageId);
        $query->bindValue(':offsets', $offset, \PDO::PARAM_INT);
        $query->bindValue(':numberPerPage', $this->numberPerPage, \PDO::PARAM_INT);
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
                      `applicant_course`.`start_date` AS 'cohortDate',
                      `apprentice`, `aptitude`, `assessmentDay`, 
                      `assessmentTime`,
                      `assessmentNotes`, `diversitechInterest`, `diversitech`, `edaid`, `upfront`, `kitCollectionDay`,
                      `kitCollectionTime`, `kitNum`, `laptop`, `laptopDeposit`, `laptopNum`, 
                      `tasterEvent`.`date` AS `taster`, `tasterId`,
                      `tasterAttendance`, `teams`.`trainer` AS 'team', `cohortId`, `hearAboutId`, `backgroundInfoId`,
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
                        LEFT JOIN `courses` applicant_course
                            ON `applicants`.`cohortId` = `applicant_course`.`id`
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
                            `cohortId` = :cohortId,
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
        $query->bindValue(':stageOptionId', $applicant['stageOptionId']);
        $query->bindValue(':dateTimeAdded', $applicant['dateTimeAdded']);
        $query->bindValue(':backgroundInfoId', $applicant['backgroundInfoId']);

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

    public function addApplicantToTeam(int $teamId, int $applicantId)
    {
        $sql = 'UPDATE `applicants_additional` SET `team` = :teamId WHERE `id` = :applicantId';
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

    public function updateApplicantStageAndOptionIds(int $applicantId, int $stageId, ?int $optionId)
    {
        $query = $this->db->prepare(
            "UPDATE `applicants` SET `stageId` = :stageId, `stageOptionId` = :optionId WHERE `id` = :applicantId"
        );
        return $query->execute([':applicantId' => $applicantId, ':stageId' => $stageId, ':optionId' => $optionId]);
    }
}
