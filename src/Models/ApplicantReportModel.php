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

    public function getGenderReport(array $queryParams): array
    {
        $genderData = [
            ['title' => 'Gender'],
            ['rows' =>
                [
                    ['category' => 'Male', 'total' => 10, 'percentage' => 50],
                    ['category' => 'Female', 'total' => 10, 'percentage' => 50],
                    ['category' => 'Non-binary', 'total' => 0, 'percentage' => 0],
                    ['category' => 'Prefer not to say', 'total' => 0, 'percentage' => 0],
                ]
            ]
        ];

        return $genderData;
    }

    public function getBackgroundReport(array $queryParams): array
    {
        $backgroundData = [
            ['title' => 'Background'],
            ['rows' =>
                [
                    ['category' => 'Student', 'total' => 10, 'percentage' => 50],
                    ['category' => 'Not Student', 'total' => 10, 'percentage' => 50],
                    ['category' => 'Career Switch', 'total' => 0, 'percentage' => 0],
                    ['category' => 'Prefer not to say', 'total' => 0, 'percentage' => 0],
                ]
            ]
        ];

        return $backgroundData;
    }

    public function getHeadAboutUsReport(array $queryParams): array
    {
        $heardAboutUSData = [
            ['title' => 'Heard About Us'],
            ['rows' =>
                [
                    ['category' => 'E-Mail', 'total' => 10, 'percentage' => 50],
                    ['category' => 'Phone', 'total' => 10, 'percentage' => 50],
                    ['category' => 'Word of the lord', 'total' => 0, 'percentage' => 0],
                    ['category' => 'Prefer not to say', 'total' => 0, 'percentage' => 0],
                ]
            ]
        ];
        return $heardAboutUSData;
    }
}