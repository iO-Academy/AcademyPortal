<?php

namespace Portal\Models;

use Portal\Interfaces\ApplicantEntityInterface;

class ApplicantModel
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
    public function insertNewApplicantToDb(ApplicantEntityInterface $applicant)
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

        return $query->execute();
    }

    /**
     * Sorts the table via the input taken from the sorting arrows
     *
     * @param string $sortingQuery - how you would like the results sorted
     * @return array $results is the data retrieved.
     */
    public function getAllApplicants(string $sortingQuery)
    {
        $stmt = "SELECT `applicants`.`id`, `name`, `email`, `dateTimeAdded`, `date` 
                      AS 'cohortDate'
                      FROM `applicants`
                      LEFT JOIN `cohorts` ON `applicants`.`cohortId`=`cohorts`.`id`
                      WHERE `applicants`.`deleted` = '0' ";

        $stmt .= $this->sortingQuery($sortingQuery);

        $query = $this->db->prepare($stmt);
        $query->setFetchMode(\PDO::FETCH_CLASS, 'Portal\Entities\BaseApplicantEntity');

        $query->execute();

        return $query->fetchAll();
    }

    /**
     * Gets a sorted list of appliciants assigned to a specific cohort.
     *
     * @param string $sortingQuery how you would like the results sorted
     * @param string $cohortId the cohort you would like the results of
     * @return array the data retrieved from the database
     */
    public function getAllApplicantsByCohort(string $sortingQuery, string $cohortId)
    {
        $stmt = "SELECT `applicants`.`id`, `name`, `email`, `dateTimeAdded`, `date` 
                      AS 'cohortDate'
                      FROM `applicants`
                      LEFT JOIN `cohorts` ON `applicants`.`cohortId`=`cohorts`.`id`
                      WHERE `applicants`.`deleted` = '0' AND `applicants`.`cohortId` = :cohortId ;";

        $stmt .= $this->sortingQuery($sortingQuery);

        $query = $this->db->prepare($stmt);
        $query->setFetchMode(\PDO::FETCH_CLASS, 'Portal\Entities\BaseApplicantEntity');
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
            'SELECT `applicants`.`id`, `name`, `email`, `phoneNumber`, `whyDev`, `codeExperience`, 
                      `eligible`, `eighteenPlus`, `finance`, `notes`, `dateTimeAdded`,  `hearAbout`,  `date` 
                        AS "cohortDate" 
                        FROM `applicants` 
                        LEFT JOIN `cohorts` 
                        ON `applicants`.`cohortId`=`cohorts`.`id` 
                        LEFT JOIN `hearAbout` 
                        ON `applicants`.`hearAboutId`=`hearAbout`.`id` 
                        WHERE `applicants`.`id`= :id;'
        );
        $query->setFetchMode(\PDO::FETCH_CLASS, 'Portal\Entities\ApplicantEntity');
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
    private function sortingQuery(string $sortingQuery): string
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
}
