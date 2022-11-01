<?php

namespace Portal\Controllers\FrontEnd;

use Portal\Abstracts\Controller;
use Portal\Models\CourseModel;
use Portal\Models\TrainerModel;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Views\PhpRenderer;

class AddCoursePageController extends Controller
{
    private PhpRenderer $renderer;
    private TrainerModel $trainerModel;

    /**
     * Creates new instance of DisplayAddCoursesController
     *
     * @param PhpRenderer $renderer
     * @param courseModel $courseModel
     */
    public function __construct(PhpRenderer $renderer, TrainerModel $trainerModel)
    {
        $this->renderer = $renderer;
        $this->trainerModel = $trainerModel;
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
            $args['trainers'] = $this->trainerModel->getAllTrainers();
            return $this->renderer->render($response, 'addCourse.phtml', $args);
        } else {
            return $response->withHeader('Location', './');
        }
    }
}
