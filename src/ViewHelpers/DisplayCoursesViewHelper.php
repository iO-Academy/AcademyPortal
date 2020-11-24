<?php

namespace Portal\ViewHelpers;

use Portal\Interfaces\CourseEntityInterface;

class DisplayCoursesViewHelper
{
    /**
     * Concatenates new applicant's name, email and cohort to join ready to be output, excluding apprentices.
     *
     * @param $courses
     *
     * @return string $result, returns name, email, cohortID and all the data for the applicant.
     */
    public static function displayCourses($courses): string
    {
        $result = '';
        foreach ($courses as $course) {
            $result .=
                '<tr>
                    <td>' . $course->getId() . '</td>
                    <td>' . $course->getStartDate() . '</td>
                    <td>' . $course->getEndDate() . '</td>
                    <td>' . $course->getName() . '</td>
                    <td>' . $course->getTrainer() . '</td>
                    <td>' . $course->getNotes() . '</td>
                </tr>';
        }
        return self::handleNoCourses($result);
    }

    private static function handleNoCourses(string $output): string
    {
        if (empty($output)) {
            return '<tr><td colspan="6"><h5 class="text-danger text-center">No Courses Found.</h5></td></tr>';
        }
        return $output;
    }
}
