<?php

namespace Portal\Abstracts;

use DateTime;

class CourseSplitterHelper
{
    /**
     * @throws \Exception
     */
    public static function splitCourses(string $startDate, string $endDate,
                                        string $courseName, string $categoryName): array
    {
        $currentStart = new DateTime($startDate);
        $end = new DateTime($endDate);
        $courses = [];

        while ($currentStart <= $end) {
            if ($currentStart->format('N') > 5) {
                // If it's Saturday or Sunday, skip to Monday
                $currentStart->modify('next Monday');
                continue;
            }

            $currentEnd = clone $currentStart;
            $currentEnd->setTime(23, 59, 59);

            // Set end date to this week's Friday unless it's already Friday
            if ($currentStart->format('N') < 5) {
                $daysToAdd = 5 - $currentStart->format('N'); // N is 1-7, Monday (1) to Sunday (7)
                $currentEnd->modify("+$daysToAdd days");
            }

            // Check if calculated end date is beyond the range's end date
            if ($currentEnd > $end) {
                $currentEnd = clone $end;
            }

            $courses[] = [
                'title' => $courseName,
                'start' => $currentStart->format('Y-m-d'),
                'end' => $currentEnd->modify("+1 days")->format('Y-m-d'),
                'categoryName' => $categoryName,
            ];

            // Move start date to next Monday
            $currentStart = clone $currentEnd;
            $currentStart->modify('+2 days'); // Move to next Monday
        }
        return $courses;
    }
}
