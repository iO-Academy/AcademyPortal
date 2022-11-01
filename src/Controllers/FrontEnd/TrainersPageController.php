<?php

namespace Portal\Controllers\FrontEnd;

use Portal\Abstracts\Controller;
use Portal\Models\TrainerModel;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Views\PhpRenderer;

class TrainersPageController extends Controller
{
    private PhpRenderer $renderer;
    private TrainerModel $trainerModel;

    /**
     * Creates new instance of TrainersPageController
     */
    public function __construct(PhpRenderer $renderer, TrainerModel $trainerModel)
    {
        $this->renderer = $renderer;
        $this->trainerModel = $trainerModel;
    }

    /**
     * Checks for logged-in status,
     *
     * and returns rendered landing screen for trainers page
     *
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     */
    public function __invoke(Request $request, Response $response, array $args)
    {
        if ($_SESSION['loggedIn'] === true) {
            $trainers = $this->trainerModel->getAllTrainers();
            $args['trainers'] = $trainers;
            return $this->renderer->render($response, 'trainers.phtml', $args);
        } else {
            return $response->withHeader('Location', './');
        }
    }
}
