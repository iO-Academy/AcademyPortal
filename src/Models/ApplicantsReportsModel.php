<?php

namespace Portal\Models;

use PDO;

class ApplicantsReportsModel
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function extractDataForApplicantReports(int $reportType, int $startDate, int $endDate): array
    {
        switch ($reportType) {
            case 1:
                $report = 'gender';
                $column = '`gender`.`gender`';
                $table = 'gender';
                $foreignKeyColumn = 'gender';
                break;
            case 2:
                $report = 'backgroundInfo';
                $column = 'backgroundInfo';
                $table = 'background_info';
                $foreignKeyColumn = 'backgroundInfoId';
                break;
            case 3:
                $report = 'hearAbout';
                $column = 'hearAbout';
                $table = 'hear_about';
                $foreignKeyColumn = 'hearAboutId';
                break;
        }

        $sql = 'SELECT ' . $column . ' AS "report", COUNT(' . $column . ') AS "total"
                FROM `applicants`
                LEFT JOIN `' . $table . '`
                ON `applicants`.`' . $foreignKeyColumn . '` = `' . $table . '`.`id`
                WHERE `dateTimeAdded` BETWEEN :startDate AND :endDate
                GROUP BY 1
                UNION
                SELECT `' . $report . '`, 0 AS "total"
                FROM `' . $table . '`
                WHERE `' . $table . '`.`id` NOT IN (
                SELECT DISTINCT `applicants`.`' . $foreignKeyColumn . '`
                FROM `applicants`
                WHERE `dateTimeAdded` BETWEEN :startDate AND :endDate)
                GROUP BY 1 ;';


        $query = $this->db->prepare($sql);

        $query->bindParam(':startDate', $startDate);
        $query->bindParam(':endDate', $endDate);

        $query->execute();
        return $query->fetchAll();
    }
}
