<?php

namespace Portal\Interfaces;

interface ApplicantModelInterface
{
    public function __construct(\PDO $db);

    public function storeApplicant(array $applicant);

    public function getApplicants(string $stageID, string $cohortId, string $sortingQuery);

    public function getApplicantById($id);

    public function deleteApplicant($id);

    public function updateApplicant(array $applicant);

    public function updateApplicantAdditionalFields(array $applicant);
}
