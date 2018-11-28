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
     *  Inserts new ApplicantEntity into database - registering
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
        $query = $this->db->prepare('SELECT `name`, `email`, `date` AS "cohortDate" FROM `applicants` LEFT JOIN `cohorts` ON `applicants`.`cohortId`=`cohorts`.`id`;');
        $query->setFetchMode(\PDO::FETCH_CLASS, 'Portal\Entities\ApplicantEntity');
        $query->execute();
        $results = $query->fetchAll();
        return $results;
    }

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
