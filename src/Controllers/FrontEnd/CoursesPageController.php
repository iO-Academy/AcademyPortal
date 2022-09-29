<?php

namespace Portal\Controllers\FrontEnd;

use Portal\Abstracts\Controller;
use Portal\Models\CourseModel;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Views\PhpRenderer;

class CoursesPageController extends Controller
{
    private $renderer;
    private $courseModel;

    /**
     * Creates new instance of CoursesPageController
     *
     * @param PhpRenderer $renderer
     * @param courseModel $courseModel
     */
    public function __construct(PhpRenderer $renderer, CourseModel $courseModel)
    {
        $this->renderer = $renderer;
        $this->courseModel = $courseModel;
    }

    /**
     * Checks for logged-in status,
     * gets courses categories from DB
     * and returns rendered landing screen for Courses page
     *
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     */
    public function __invoke(Request $request, Response $response, array $args)
    {
        if ($_SESSION['loggedIn'] === true) {
            $courses = $this->courseModel->getAllCourses();
            $data = ['data' => $courses];
            return $this->renderer->render($response, 'courses.phtml', $data);
        } else {
            return $response->withHeader('Location', './');
        }
    }
}
