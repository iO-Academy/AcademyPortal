<?php

namespace Portal\Controllers\FrontEnd;

use Portal\Abstracts\Controller;
use Portal\Models\TrainerModel;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Views\PhpRenderer;

class AddTrainerPageController extends Controller
{
    private PhpRenderer $renderer;

    public function __construct(PhpRenderer $renderer)
    {
        $this->renderer = $renderer;
    }

    /**
     * Checks for logged-in status,
     * and returns rendered landing screen for add trainer page
     */
    public function __invoke(Request $request, Response $response, array $args): Response
    {
        if ($_SESSION['loggedIn'] === true) {
            return $this->renderer->render($response, 'addTrainer.phtml');
        } else {
            return $response->withHeader('Location', './');
        }
    }
}
