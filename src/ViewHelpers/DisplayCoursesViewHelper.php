<?php

namespace Portal\ViewHelpers;

class DisplayCoursesViewHelper
{
     /**
      * Viewhelper to display courses within course detail table
      */
    public static function displayCourses(array $courses, array $trainers): string
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
        return self::handleNoCourses($result);
    }

    public static function displayFutureCourses(array $courses, array $trainers): string
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
        return self::handleNoCourses($result);
    }

    /**
     * If no courses found, returns message saying no courses found.
     */
    private static function handleNoCourses(string $output): string
    {
        if (empty($output)) {
            return '<tr><td colspan="6"><h5 class="text-danger text-center">No Courses Found.</h5></td></tr>';
        }
        return $output;
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
