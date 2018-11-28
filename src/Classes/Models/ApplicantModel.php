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

        $query->bindParam(':name', $applicant->getApplicantName());
        $query->bindParam(':email', $applicant->getApplicantEmail());
        $query->bindParam(':phoneNumber', $applicant->getApplicantPhoneNumber());
        $query->bindParam(':cohortId', $applicant->getApplicantCohortId());
        $query->bindParam(':whyDev', $applicant->getApplicantWhyDev());
        $query->bindParam(':codeExperience', $applicant->getApplicantCodeExperience());
        $query->bindParam(':hearAboutId', $applicant->getApplicantHearAboutId());
        $query->bindParam(':eligible', $applicant->getApplicantEligible());
        $query->bindParam(':eighteenPlus', $applicant->getApplicantEighteenPlus());
        $query->bindParam(':finance', $applicant->getApplicantFinance());
        $query->bindParam(':notes', $applicant->getApplicantNotes());

        return $query->execute();
    }

    /**
     * Retrieves selected applicant data from applicant table and cohort date from cohort table.
     *
     * @return array $results is the data retrieved.
     */
    public function getAllApplicants()
    {
        $query = $this->db->prepare('SELECT `name`, `email`, `date` FROM `applicants` LEFT JOIN `cohorts` ON `applicants`.`cohortId`=`cohorts`.`id`;');
        //fetchClass
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
