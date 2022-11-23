<?php

namespace Portal\Models;

use PDO;
use Portal\Interfaces\ApplicantModelInterface;

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
                $table = "gender";
                $foreignKeyColumn = 'gender';
                break;
            case 3:
                $report = 'hearAbout';
                $column = 'hearAbout';
                $table = "hear_about";
                $foreignKeyColumn = 'hearAboutId';

                break;
            case 2:
                $report = 'backgroundInfo';
                $column = 'backgroundInfo';
                $table = "background_info";
                $foreignKeyColumn = 'backgroundInfoId';
                break;
        }

        $sql = 'SELECT ' . $column . ' AS "report", COUNT(' . $column . ') AS "total"
                FROM `applicants`
                LEFT JOIN `' . $table . '`
                ON `applicants`.`' . $foreignKeyColumn . '` = `' . $table . '`.`id`
                WHERE `dateTimeAdded` BETWEEN :startDate AND :endDate
                GROUP BY 1
                UNION
                SELECT `' . $report . '`, 0 AS "Total"
                FROM `' . $table . '`
                WHERE `' . $table . '`.`id` NOT IN (
                SELECT DISTINCT `applicants`.`' . $foreignKeyColumn . '`
                FROM `applicants`
                WHERE `dateTimeAdded` BETWEEN :startDate AND :endDate);';


        $query = $this->db->prepare($sql);

        $query->bindParam(':startDate', $startDate);
        $query->bindParam(':endDate', $endDate);

        $query->execute();
        return $query->fetchAll();
    }
}
////// hearAbout
//SELECT `hearAbout` AS "report", COUNT(`hearAbout`) AS "total"
//FROM `applicants`
//LEFT JOIN `hear_about`
//ON `applicants`.`hearAboutId` = `hear_about`.`id`
//WHERE `dateTimeAdded` BETWEEN 20190101 AND 20220101
//GROUP BY 1
//UNION
//SELECT `hearAbout`, 0 AS "Total"
//FROM `hear_about`
//WHERE `hear_about`.`id` NOT IN (
//SELECT DISTINCT `hearAboutId`
//FROM `applicants`
//WHERE `dateTimeAdded` BETWEEN 20190101 AND 20220101);
////// gender
//SELECT `gender`.`gender` AS "report", COUNT(`applicants`.`gender`) AS "total"
//FROM `applicants`
//LEFT JOIN `gender`
//ON `applicants`.`gender` = `gender`.`id`
//WHERE `dateTimeAdded` BETWEEN 20190101 AND 20220101
//GROUP BY 1
//UNION
//SELECT `gender`.`gender`, 0 AS "total"
//FROM `gender`
//WHERE `gender`.`id` NOT IN (
//    SELECT DISTINCT `applicants`.`gender`
//FROM `applicants`
//WHERE `dateTimeAdded` BETWEEN 20190101 AND 20220101);
