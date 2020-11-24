<?php


namespace Portal\Interfaces;

use Portal\Entities\CompleteApplicantEntity;

interface ApplicantModelInterface
{
    public function __construct(\PDO $db);

    public function storeApplicant(ApplicantEntityInterface $applicant);

    public function getApplicants(string $stageID, string $cohortId, string $sortingQuery);

    public function getApplicantById($id);

    public function deleteApplicant($id);

    public function updateApplicant(ApplicantEntityInterface $applicant);

    public function updateApplicantAdditionalFields(CompleteApplicantEntity $applicant);
}
