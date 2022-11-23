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


//    public function extractDataForApplicantReports(string $reportType, int $startDate, int $endDate): array
//    {
//        $query = $this->db->prepare('SELECT `:reportType`, COUNT(`dateTimeAdded`)
//        FROM `applicants`
//        WHERE `dateTimeAdded` >= :startDate and `dateTimeAdded` < :$endDate
//        GROUP BY 1;');
//        $query->bindParam(':reportType', $reportType);
//        $query->bindParam(':startDate', $startDate);
//        $query->bindParam(':endDate', $endDate);
//        $query->execute();
//        return $query->fetchAll();
//
//    }

    public function extractDataForApplicantReports(): array
    {
        $query = $this->db->prepare('SELECT `gender`, COUNT(`dateTimeAdded`)
        FROM `applicants`
        WHERE `dateTimeAdded` >= :startDate and `dateTimeAdded` < :endDate
        GROUP BY :reportType;');
//        $reportType = 'gender';
//        $startDate = 20190101;
//        $endDate = 20220101;
//        $query->bindParam(':reportType', $reportType);
        $query->bindParam(':startDate', $startDate);
        $query->bindParam(':endDate', $endDate);
        $query->execute();
        return $query->fetchAll();

    }


SELECT `gender`.`gender`, COUNT(`dateTimeAdded`) FROM `applicants`
RIGHT JOIN `gender` ON `applicants`.`gender` = `gender`.`id`
WHERE `dateTimeAdded` >= '2019-01-01' and `dateTimeAdded` < '2022-01-01'
GROUP BY 1
}
