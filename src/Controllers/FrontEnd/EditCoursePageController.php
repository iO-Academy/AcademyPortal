<?php

namespace Portal\Controllers\FrontEnd;

use Portal\Abstracts\Controller;
use Portal\Models\CourseModel;
use Portal\Models\TrainerModel;
use Slim\Views\PhpRenderer;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

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
        $id = $request->getQueryParams()['id'];
        $data['course'] = $this->courseModel->getCourseById($id);
        $data['selectedTrainerIds'] = $this->courseModel->getTrainersIdByCourseId($id);
        $data['trainers'] = $this->trainerModel->getAllTrainers();
        if (!empty($data)) {
            return $this->renderer->render($response, 'editCourse.phtml', $data);
        }
        else {
            return $this->renderer->render($response, '404.phtml');
        }

    }
}
