<?php

namespace Portal\Controllers\API;

use Portal\Abstracts\Controller;
use Portal\Abstracts\CourseSplitterHelper;
use Portal\Models\CourseModel;
use Portal\Models\EventModel;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class CalendarCourseController extends Controller
{
    private EventModel $eventModel;
    private CourseModel $courseModel;

    public function __construct(EventModel $eventModel, CourseModel $courseModel)
    {
        $this->eventModel = $eventModel;
        $this->courseModel = $courseModel;
    }

    /**
     * Checks for logged-in status,
     * gets all courses from DB
     *
     * @throws \Exception
     */
    public function __invoke(Request $request, Response $response, array $args): Response
    {
        if (!empty($_SESSION['loggedIn']) && $_SESSION['loggedIn']) {
            $eventData = $this->eventModel->getAllCalendarEvents();
            $courseData = $this->courseModel->getCoursesForCalendar();

            foreach ($courseData as $course) {
                $splitCourses[] = CourseSplitterHelper::splitCourses(
                    $course->startDate,
                    $course->endDate,
                    $course->title,
                    $course->categoryName
                );
            }

            $combinedData = ['eventData' => $eventData, 'courseData' => $splitCourses];

            return $this->respondWithJson($response, $combinedData, 200);
        } else {
            return $response->withHeader('Location', './')->withStatus(301);
        }
    }
}
