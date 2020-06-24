<?php


namespace Portal\Interfaces;

use Portal\Entities\CompleteApplicantEntity;

interface ApplicantModelInterface
{
    public function __construct(\PDO $db);

    public function insertNewApplicantToDb(ApplicantEntityInterface $applicant);

    public function getAllApplicants(string $sortingQuery);

    public function getAllApplicantsByCohort(string $sortingQuery, string $cohortId);

    public function getApplicantById($id);

    public function deleteApplicant($id);

    public function updateApplicant(ApplicantEntityInterface $applicant);

    public function updateApplicantAdditionalFields(CompleteApplicantEntity $applicant);
}
