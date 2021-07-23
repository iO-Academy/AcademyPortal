<?php

namespace Portal\Controllers\FrontEnd;

use Portal\Abstracts\Controller;
use Portal\Models\CourseModel;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Views\PhpRenderer;

class AddCoursePageController extends Controller
{
    private $renderer;
    private $courseModel;

    /**
     * Creates new instance of DisplayAddCoursesController
     *
     * @param PhpRenderer $renderer
     * @param courseModel $courseModel
     */
    public function __construct(PhpRenderer $renderer, CourseModel $courseModel)
    {
        $this->renderer = $renderer;
        $this->courseModel = $courseModel;
    }


