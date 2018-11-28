<?php

namespace Portal\Models;

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
     * @param string $applicantName
     * @param string $applicantEmail
     * @param string $applicantPhoneNumber
     * @param int $applicantCohortId
     * @param string $applicantWhyDev
     * @param string $applicantCodeExperience
     * @param int $applicantHearAboutId
     * @param string $applicantEligible
     * @param string $applicantEighteenPlus
     * @param string $applicantFinance
     * @param string $applicantNotes
     *
     * @return bool
     */
    public function insertNewApplicantToDb(
        string $applicantName,
        string $applicantEmail,
        string $applicantPhoneNumber,
        int $applicantCohortId,
        string $applicantWhyDev,
        string $applicantCodeExperience,
        int $applicantHearAboutId,
        string $applicantEligible,
        string $applicantEighteenPlus,
        string $applicantFinance,
        string $applicantNotes
    ) {
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

        $query->bindParam(':name', $applicantName);
        $query->bindParam(':email', $applicantEmail);
        $query->bindParam(':phoneNumber', $applicantPhoneNumber);
        $query->bindParam(':cohortId', $applicantCohortId);
        $query->bindParam(':whyDev', $applicantWhyDev);
        $query->bindParam(':codeExperience', $applicantCodeExperience);
        $query->bindParam(':hearAboutId', $applicantHearAboutId);
        $query->bindParam(':eligible', $applicantEligible);
        $query->bindParam(':eighteenPlus', $applicantEighteenPlus);
        $query->bindParam(':finance', $applicantFinance);
        $query->bindParam(':notes', $applicantNotes);

        return $query->execute();
    }

    /**
     * Retrieves selected applicant data from applicant table and cohort date from cohort table.
     *
     * @return array $results is the data retrieved.
     */
    public
    function getAllApplicants()
    {
        $query = $this->db->prepare('SELECT `name`, `email`, `date` FROM `applicants` LEFT JOIN `cohorts` ON `applicants`.`cohortId`=`cohorts`.`id`;');
        $query->execute();
        $results = $query->fetchAll(\PDO::FETCH_ASSOC);
        return $results;
    }
}

