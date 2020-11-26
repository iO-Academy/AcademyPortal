<?php

namespace Portal\ViewHelpers;

use Portal\Interfaces\CourseEntityInterface;

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
            $result .=
                '<tr>
                    <td>' . $course->getId() . '</td>
                    <td>' . date("j F Y", strtotime($course->getStartDate())) . '</td>
                    <td>' . date("j F Y", strtotime($course->getEndDate())) . '</td>
                    <td>' . $course->getName() . '</td>
                    <td>' . $course->getTrainer() . '</td>
                    <td>' . $course->getNotes() . '</td>
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
}
