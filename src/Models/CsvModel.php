<?php

namespace Portal\Models;

class CsvModel
{
    private $db;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }



    /**
     * Inserts new ApplicantEntity into database - registering.
     *
     * @param $applicants
     *
     * @return bool
     */
    public function uploadCsv(string $file)
    {
        $rows = array_map('str_getcsv', file('$file'));
        $header = array_shift($rows);
        $applicants = array();
        foreach ($rows as $row) {
            $applicants[] = array_combine($header, $row);
        }

        foreach ($applicants as $applicant) {
            $query = $this->db->prepare(
                "INSERT INTO `applicants` (
                            `name`,
                            `email`,
                            `phoneNumber`,
                            `gender`,
                            `whyDev`,
                            `codeExperience`,
                            `hearAboutId`,
                            `eligible`,
                            `eighteenPlus`,
                            `finance`,
                            `notes`,
                            `backgroundInfoId`
                            )
                        VALUES (
                            :name,
                            :email,
                            :phoneNumber,
                            :gender,
                            :whyDev,
                            :codeExperience,
                            :hearAboutId,
                            :eligible,
                            :eighteenPlus,
                            :finance,
                            :notes,
                            :backgroundInfoId
                        );"
            );

            $query->bindValue(':name', $applicant['name']);
            $query->bindValue(':email', $applicant['email']);
            $query->bindValue(':phoneNumber', $applicant['phoneNumber']);
            $query->bindValue(':gender', $applicant['gender']);
            $query->bindValue(':whyDev', $applicant['whyDev']);
            $query->bindValue(':codeExperience', $applicant['codeExperience']);
            $query->bindValue(':hearAboutId', $applicant['hearAboutId']);
            $query->bindValue(':eligible', $applicant['eligible']);
            $query->bindValue(':eighteenPlus', $applicant['eighteenPlus']);
            $query->bindValue(':finance', $applicant['finance']);
            $query->bindValue(':notes', $applicant['notes']);
            $query->bindValue(':backgroundInfoId', $applicant['backgroundInfoId']);

            $result = $query->execute();
        }
//    if ($result) {
//      $id = $this->db->lastInsertId();
//      foreach ($applicant['cohort'] as $cohortId) {
//        $applicantModel = $this->db->prepare(
//          'INSERT INTO `course_choice` (`courseId`, `applicantId`) VALUES (?,?)'
//        );
//        $applicantModel->execute([$cohortId, $id]);
//      }
//      $applicantsAdditionalQuery = $this->db->prepare('INSERT INTO `applicants_additional` (`id`) VALUES (?)');
//      return $applicantsAdditionalQuery->execute([$id]);
//    }
        return $result;
    }
}