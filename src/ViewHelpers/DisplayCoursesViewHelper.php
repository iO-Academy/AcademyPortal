<?php

namespace Portal\ViewHelpers;

class DisplayCoursesViewHelper
{
     /**
      * Viewhelper to display courses within course detail table
      *
      * @param array $courses
      * @param array $trainers
      * @return string
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
                    <td>' . date("j F Y", strtotime($course->getStartDate())) . '</td>
                    <td>' . date("j F Y", strtotime($course->getEndDate())) . '</td>
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
     *
     * @param string $output
     *
     * @return string
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
     *
     * @param array $trainersByCourse
     * @return string
     */
    public static function displayCourseTrainers($trainersByCourse): string
    {
        if (!empty($trainersByCourse)) {
            $result = '';
            foreach ($trainersByCourse as $trainer) {
                $result .= '<p>' . $trainer['name'] . '</p>';
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
