<?php

namespace Portal\ViewHelpers;

class DisplayCoursesViewHelper
{
    /**
     * Concats course details into table TRs.
     *
     * @param $courses
     *
     * @return string $result, returns id, startDate, endDate, name, trainer, notes.
     */
    public static function displayCourses($courses): string
    {
        $result = '';
        foreach ($courses as $course) {
            $remote = $course->getRemote() == 1 ? '&#x2713;' : '&#x10102';
            $inPerson = $course->getInPerson() == 1 ? '&#x2713;' : '&#x10102';

            $result .=
                '<tr>
                    <td>' . $course->getId() . '</td>
                    <td>' . date("j F Y", strtotime($course->getStartDate())) . '</td>
                    <td>' . date("j F Y", strtotime($course->getEndDate())) . '</td>
                    <td>' . $course->getName() . '</td>
                    <td>' . $course->getTrainer() . '</td>
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

    // Add new static method to foreach through below method to print in viewhelper -- displayCourseTrainers()

    public static function filterCoursesByTrainers(array $trainers, $courseId)
    {
        return array_filter($trainers, function ($trainer) use ($courseId) {
            return $trainer['course_id'] == $courseId;
        });
    }
}
