<?php

namespace Portal\Controllers\FrontEnd;

use Portal\Abstracts\Controller;
use Portal\Models\CourseModel;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Views\PhpRenderer;

class AddNewCategoryPageController extends Controller
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
     * gets courses categories from DB
     * and returns rendered landing screen for Courses page
     */
    public function __invoke(Request $request, Response $response, array $args): Response
    {
        if (!empty($_SESSION['loggedIn']) && $_SESSION['loggedIn']) {
            $args['categories'] = $this->courseModel->getCategories();
            return $this->renderer->render($response, 'addNewCategory.phtml', $args);
        } else {
            return $response->withHeader('Location', './')->withStatus(301);
        }
    }
}
