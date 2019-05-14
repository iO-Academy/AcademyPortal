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
    public function insertNewApplicantToDb(ApplicantEntity $applicant) {
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

        $query->bindParam(':name', $applicant->getName());
        $query->bindParam(':email', $applicant->getEmail());
        $query->bindParam(':phoneNumber', $applicant->getPhoneNumber());
        $query->bindParam(':cohortId', $applicant->getCohortId());
        $query->bindParam(':whyDev', $applicant->getWhyDev());
        $query->bindParam(':codeExperience', $applicant->getCodeExperience());
        $query->bindParam(':hearAboutId', $applicant->getHearAboutId());
        $query->bindParam(':eligible', $applicant->getEligible());
        $query->bindParam(':eighteenPlus', $applicant->getEighteenPlus());
        $query->bindParam(':finance', $applicant->getFinance());
        $query->bindParam(':notes', $applicant->getNotes());

        return $query->execute();
    }

    /**
     * Retrieves selected applicant data from applicant table and cohort date from cohort table.
     *
     * @return array $results is the data retrieved.
     */
    public function getAllApplicants()
    {
        $query = $this->db->prepare('SELECT `applicants`.`id`, `name`, `email`, `date` AS "cohortDate" FROM `applicants` LEFT JOIN `cohorts` ON `applicants`.`cohortId`=`cohorts`.`id`;');
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
        $query = $this->db->prepare('SELECT `applicants`.`id`, `name`, `email`, `phoneNumber`, `whyDev`, `codeExperience`, `eligible`, `eighteenPlus`, `finance`, `notes`, `dateTimeAdded`,  `hearAbout`,  `date` 
                                                AS "cohortDate" 
                                                FROM `applicants` 
                                                LEFT JOIN `cohorts` 
                                                ON `applicants`.`cohortId`=`cohorts`.`id` 
                                                LEFT JOIN `hearAbout` 
                                                ON `applicants`.`hearAboutId`=`hearAbout`.`id` 
                                                WHERE `applicants`.`id`= :id;');
        $query->setFetchMode(\PDO::FETCH_ASSOC);
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
    )
    {
        return new ApplicantEntity(
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
