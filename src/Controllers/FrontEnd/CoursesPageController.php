<?php

namespace Portal\Controllers\FrontEnd;

use Portal\Abstracts\Controller;
use Portal\Models\CourseModel;
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
        if ($_SESSION['loggedIn'] === true) {
            $ongoingCourses = $this->courseModel->getOngoingCourses();
            $args['ongoingCourses'] = $ongoingCourses;
            $futureCourses = $this->courseModel->getFutureCourses();
            $args['futureCourses'] = $futureCourses;
            $completedCourses = $this->courseModel->getCompletedCourses();
            $args['completedCourses'] = $completedCourses;
            $trainers = $this->courseModel->getTrainersAndCourseId();
            $args['trainers'] = $trainers;
            return $this->renderer->render($response, 'courses.phtml', $args);
        } else {
            return $response->withHeader('Location', './');
        }
    }
}
