<?php

namespace Portal\Controllers\FrontEnd;

use Portal\Abstracts\Controller;
use Portal\Models\TrainerModel;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Views\PhpRenderer;

class AddTrainerPageController extends Controller
{
    private $renderer;
    private $trainerModel;

    /**
     * Creates new instance of AddTrainerPageController
     *
     * @param PhpRenderer $renderer
     * @param TrainerModel $trainerModel
     */
    public function __construct(PhpRenderer $renderer, TrainerModel $trainerModel)
    {
        $this->renderer = $renderer;
        $this->trainerModel = $trainerModel;
    }

    /**
     * Checks for logged-in status,
     *
     * and returns rendered landing screen for add trainer page
     *
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     */
    public function __invoke(Request $request, Response $response, array $args)
    {
        if ($_SESSION['loggedIn'] === true) {
            return $this->renderer->render($response, 'addTrainer.phtml');
        } else {
            return $response->withHeader('Location', './');
        }
    }
}
