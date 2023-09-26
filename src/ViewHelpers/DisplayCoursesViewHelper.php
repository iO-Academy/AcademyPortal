<?php

namespace Portal\ViewHelpers;

use Portal\Services\DateService;

class DisplayCoursesViewHelper
{
    private const HANDLE_NO_COURSES = '<tr><td colspan="8"><h5 class="text-danger text-center">No Courses Found</h5></td></tr>';
    public static function createCoursesTableLoop(array $courses, array $trainers): string
    {
        $result = '';
        foreach ($courses as $course) {
            $remote = $course->getRemote() == 1 ? '&#x2713;' : '&#x10102';
            $inPerson = $course->getInPerson() == 1 ? '&#x2713;' : '&#x10102';
            $trainersByCourse = self::filterCoursesByTrainers($trainers, $course->getId());
            $result .=
                '<tr>
                    <td>' . $course->getId() . '</td>
                    <td>' . date("d/m/Y", strtotime($course->getStartDate())) . '</td>
                    <td>' . date("d/m/Y", strtotime($course->getEndDate())) . '</td>
                    <td>' . $course->getName() . '</td>
                    <td>' . self::displayCourseTrainers($trainersByCourse) . '</td>
                    <td>' . $course->getNotes() . '</td>
                    <td>' . $inPerson . '</td>
                    <td>' . $remote . '</td>
                </tr>';
        }
        return $result;
    }
     /**
      * Viewhelper to display courses within course detail table
      */
    public static function displayFutureCourses(array $courses, array $trainers): string
    {
        $result = self::createCoursesTableLoop($courses, $trainers);
        if (!empty($result)) {
            return $result;
        }
        return self::HANDLE_NO_COURSES;
    }

    public static function displayOngoingCourses(array $courses, array $trainers): string
    {
        $result = '';
        if (!empty($courses)) {
            $result = self::createCoursesTableLoop($courses, $trainers);
        }
        return $result;
    }

    /**
     * function displays a heading row of 'Ongoing Courses' in the courses table
     * */
    public static function displayOngoingCoursesHeading(bool $ongoingCourses): string
    {
        $row = '';
        if ($ongoingCourses) {
            $row = '<tr><td colspan="8"><h5 class="text-success text-center">Ongoing Courses</h5></td></tr>';
        }
        return $row;
    }

    /**
     * If no courses found, returns message saying no courses found.
     */
    private static function handleNoCourses(): string
    {
            return '<tr><td colspan="8"><h5 class="text-danger text-center">No Courses Found</h5></td></tr>';
    }

    /**
     * Foreach through filtered trainer list to display
     */
    public static function displayCourseTrainers(array $trainersByCourse): string
    {
        if (!empty($trainersByCourse)) {
            $result = '';
            foreach ($trainersByCourse as $trainer) {
                if (!$trainer['deleted']) {
                    $result .= '<p>' . $trainer['name'] . '</p>';
                } else {
                    $result .= '<p class="trainer-deleted-indicator">' . $trainer['name'] . '</p>';
                }
            }
            return $result;
        } else {
            return 'No trainers assigned';
        }
    }

    /**
     * Filters array of trainers by a course id
     *
     * @param array $trainers
     * @param int $courseId
     * @return array
     */
    public static function filterCoursesByTrainers(array $trainers, $courseId): array
    {
        if (!empty($trainers)) {
            return array_filter($trainers, function ($trainer) use ($courseId) {
                return $trainer['course_id'] == $courseId;
            });
        } else {
            return [];
        }
    }
}
