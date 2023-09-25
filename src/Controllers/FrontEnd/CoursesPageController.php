<?php

namespace Portal\Controllers\FrontEnd;

use Portal\Abstracts\Controller;
use Portal\Models\CourseModel;
use Portal\Services\DateService;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Views\PhpRenderer;

class CoursesPageController extends Controller
{
    private PhpRenderer $renderer;
    private CourseModel $courseModel;

    public function __construct(PhpRenderer $renderer, CourseModel $courseModel)
    {
        $this->renderer = $renderer;
        $this->courseModel = $courseModel;
    }

    /**
     * Checks for logged-in status,
     * gets courses with future end dates categories from DB
     * and returns rendered landing screen for Courses page
     */
    public function __invoke(Request $request, Response $response, array $args): Response
    {
        $todaysDate = DateService::getTodaysDateAsString();
        if ($_SESSION['loggedIn'] === true) {
            $courses = $this->courseModel->getCoursesWithFutureEndDates($todaysDate);
            $args['courses'] = $courses;
            $trainers = $this->courseModel->getTrainersAndCourseId();
            $args['trainers'] = $trainers;
            return $this->renderer->render($response, 'courses.phtml', $args);
        } else {
            return $response->withHeader('Location', './');
        }
    }
}
