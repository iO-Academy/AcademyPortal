<?php

namespace Portal\Controllers\FrontEnd;

use Portal\Abstracts\Controller;
use Portal\Models\CourseModel;
use Portal\Models\TrainerModel;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\PhpRenderer;

class EditCoursePageController extends Controller
{
    private CourseModel $courseModel;
    private PhpRenderer $renderer;
    private TrainerModel $trainerModel;

    public function __construct(CourseModel $courseModel, PhpRenderer $renderer, TrainerModel $trainerModel)
    {
        $this->courseModel = $courseModel;
        $this->renderer = $renderer;
        $this->trainerModel = $trainerModel;
    }

    public function __invoke(Request $request, Response $response, array $args): Response
    {
        if (!empty($_SESSION['loggedIn']) && $_SESSION['loggedIn']) {
            $id = $args['id'];
            if ($id > 0) {
                $args['course'] = $this->courseModel->getCourseById($id);
                $args['trainers'] = $this->trainerModel->getAllTrainers();
                $args['categories'] = $this->courseModel->getCategories();
                $args['courseTrainers'] = $this->courseModel->getTrainersIdByCourseId($id);
                return $this->renderer->render($response, 'editCourse.phtml', $args);
            }

            return $response->withHeader('Location', './courses')->withStatus(400);
        }
    }
}
