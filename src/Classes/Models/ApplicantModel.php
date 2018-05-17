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
     * Inserts new Applicant into database - registering
     *
     * @param string $registerEmail value provided from form to insert into database
     * @param string $registerPassword value provided from form to insert into database
     *
     * @return insert email and password into database
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
        string $applicantFinance
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
                            `finance`
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
                            :finance
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

        return $query->execute();
    }
}