<?php

namespace Portal\Models;

use Portal\Entities\ApplicantEntity;

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
    public function insertNewApplicantToDb(ApplicantEntity $applicant)
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
     * Retrieves selected applicant data from applicant table and cohort date from cohort table.
     *
     * @return array $results is the data retrieved.
     */
    public function getAllApplicants()
    {
        $query = $this->db->prepare(
            'SELECT `applicants`.`id`, `name`, `email`, `dateTimeAdded`, `date` 
                      AS "cohortDate" 
                      FROM `applicants` 
                      LEFT JOIN `cohorts` ON `applicants`.`cohortId`=`cohorts`.`id`
                      ORDER BY `dateTimeAdded`ASC;'
        );
        $query->setFetchMode(\PDO::FETCH_CLASS, 'Portal\Entities\ApplicantEntity');
        $query->execute();
        $results = $query->fetchAll();
        return $results;
    }

    /**
     * Sorts the table via the input taken from the sorting arrows
     *
     * @param string $input is the sort choice
     *
     * @return array $results is the data retrieved.
     */
    public function sortApplicants(string $input) //eg `dateTimeAdded`DESC
    {
        switch ($input) {
            case 'dateAsc':
                $order = '`dateTimeAdded` ASC';
                break;

            case 'dateDesc':
                $order = '`dateTimeAdded` DESC';
                break;

            case 'cohortAsc':
                $order = '`date` ASC';
                break;

            case 'cohortDesc':
                $order = '`date` DESC';
                break;

            default:
                $order = '`dateTimeAdded` ASC';
                break;
        }

        $query = $this->db->prepare(
            "SELECT `applicants`.`id`, `name`, `email`, `dateTimeAdded`, `date` 
                      AS 'cohortDate'
                      FROM `applicants`
                      LEFT JOIN `cohorts` ON `applicants`.`cohortId`=`cohorts`.`id`
                      ORDER BY $order;"
        );
        $query->setFetchMode(\PDO::FETCH_CLASS, 'Portal\Entities\ApplicantEntity');
        $query->execute();
        $results = $query->fetchAll();
        return $results;
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
     * Takes all the data/fields needed to create an applicant.
     *
     * @param $applicantName
     * @param $applicantEmail
     * @param $applicantPhoneNumber
     * @param $applicantCohortId
     * @param $applicantWhyDev
     * @param $applicantCodeExperience
     * @param $applicantHearAboutId
     * @param $applicantEligible
     * @param $applicantEighteenPlus
     * @param $applicantFinance
     * @param $applicantNotes
     *
     * @return ApplicantEntity, will then return all the data inside the applicant.
     */
    public function createNewApplicant(
        $applicantName,
        $applicantEmail,
        $applicantPhoneNumber,
        $applicantCohortId,
        $applicantWhyDev,
        $applicantCodeExperience,
        $applicantHearAboutId,
        $applicantEligible,
        $applicantEighteenPlus,
        $applicantFinance,
        $applicantNotes
    ) {
        return new ApplicantEntity(
            null,
            $applicantName,
            $applicantEmail,
            $applicantPhoneNumber,
            $applicantCohortId,
            $applicantWhyDev,
            $applicantCodeExperience,
            $applicantHearAboutId,
            $applicantEligible,
            $applicantEighteenPlus,
            $applicantFinance,
            $applicantNotes
        );
    }
}
