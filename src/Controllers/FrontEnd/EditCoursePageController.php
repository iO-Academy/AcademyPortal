<?php

namespace Portal\Controllers\FrontEnd;

use Portal\Abstracts\Controller;
use Portal\Models\CourseModel;
use Slim\Views\PhpRenderer;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class EditCoursePageController extends Controller
{
    private CourseModel $courseModel;
    private PhpRenderer $renderer;

    public function __construct(CourseModel $courseModel, PhpRenderer $renderer)
    {
        $this->courseModel = $courseModel;
        $this->renderer = $renderer;
    }

    public function __invoke(Request $request, Response $response, array $args): Response
    {
        $id = $request->getQueryParams()['id'];
        $course = $this->courseModel->getCourseById($id);
        return $this->renderer->render($response, 'editCourse.phtml', $course);
    }

}