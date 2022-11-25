<?php

namespace Portal\Models;

use PDO;

class ApplicantReportModel
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
                $title = 'Gender';
                $report = 'gender';
                $column = '`gender`.`gender`';
                $table = 'gender';
                $foreignKeyColumn = 'gender';
                break;
            case 2:
                $title = 'Background';
                $report = 'backgroundInfo';
                $column = 'backgroundInfo';
                $table = 'background_info';
                $foreignKeyColumn = 'backgroundInfoId';
                break;
            case 3:
                $title = 'Hear About Us';
                $report = 'hearAbout';
                $column = 'hearAbout';
                $table = 'hear_about';
                $foreignKeyColumn = 'hearAboutId';
                break;
            default:
                $title = '';
                $report = '';
                $column = '';
                $table = '';
                $foreignKeyColumn = '';
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

        $fetchedQuery = $query->fetchAll();;

        $total = 0;

        foreach ($fetchedQuery as $entry) {
            $total += $entry['total'];
        }

        if ($total > 0) {
            for ($i = 0; $i < count($fetchedQuery); $i++) {
                $percentage = number_format(($fetchedQuery[$i]['total'] / $total) * 100, 0);
                $fetchedQuery[$i][] = [$percentage];
            }
        } else {
            for ($i = 0; $i < count($fetchedQuery); $i++) {
                $percentage = 0;
                $fetchedQuery[$i][] = [$percentage];
            }
        }

        $titleTotalArray[] = $title;
        $titleTotalArray[] = $total;

        $formattedReportData[] = [$titleTotalArray];
        $formattedReportData[] = [$fetchedQuery];

        return $formattedReportData;
    }
}
