<?php

namespace Portal\ViewHelpers;

class DisplayCoursesViewHelper
{
    private const NO_COURSES_TABLE_HEADING =
    '<tr><td colspan="9"><h5 class="text-danger text-center">No Courses Found</h5></td></tr>';

    public const FUTURE_COURSES_HEADING_TABLE =
    '<tr><td colspan="9"><h5 class="text-primary text-center">Future Courses</h5></td></tr>';

    public const COMPLETED_COURSE_HEADING_TABLE =
    '<tr><td colspan="9"><h5 class="text-secondary text-center">Completed Courses</h5></td></tr>';

    /**
     * Method to display courses within course detail table
     */
    public static function createCoursesTableLoop(array $courses, array $trainers): string
    {
        $result = '';
        foreach ($courses as $course) {
            $remote = $course->getRemote() == 1 ? '&#x2713;' : '&#x10102';
            $inPerson = $course->getInPerson() == 1 ? '&#x2713;' : '&#x10102';
            $trainersByCourse = self::filterCoursesByTrainers($trainers, $course->getId());
            $categoryNoSpaces = str_replace(' ', '', $course->getCategory());
            $result .=
                '<tr>
                    <td>' . $course->getId() . '</td>
                    <td>' . date("d/m/Y", strtotime($course->getStartDate())) . '</td>
                    <td>' . date("d/m/Y", strtotime($course->getEndDate())) . '</td>
                    <td>' . $course->getName() . '</td>
                    <td>
                        <span class="badge badge-color-' . $categoryNoSpaces . '">' . $course->getCategory() . '</span>
                    </td>
                    <td>' . self::displayCourseTrainers($trainersByCourse) . '</td>
                    <td>' . $course->getNotes() . '</td>
                    <td>' . $inPerson . '</td>
                    <td>' . $remote . '</td>
                    <td><span class="filled-places badge">Filled: ' . $course->getSpacesTaken() .
                '</span>' . ' ' . '<span class="total-places badge">Total: '
                . $course->getTotalAvailableSpaces() .
                '</span>
                    <td><button class="btn btn-danger btnDeleteCourse" data-toggle="modal" data-target="#deleteCourseModal" 
                    data-courseId="' . $course->getId() . '">Delete</button></td>
                    </td>
                </tr>';
        }
        return $result;
    }

    public static function displayFutureCourses(array $courses, array $trainers): string
    {
        $result = self::createCoursesTableLoop($courses, $trainers);
        return !empty($result) ? $result : self::NO_COURSES_TABLE_HEADING;
    }

    public static function displayCourses(array $courses, array $trainers): string
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
            $row = '<tr><td colspan="9"><h5 class="text-success text-center">Ongoing Courses</h5></td></tr>';
        }
        return $row;
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
                    if (!empty($result)) {
                        $result .= ' ' . $trainer['name'];
                    } else {
                        $result .= $trainer['name'];
                    }
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
