<?php

namespace Portal\Controllers\FrontEnd;

use Portal\Abstracts\Controller;
use Portal\Models\TrainerModel;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\PhpRenderer;

class EditTrainerPageController extends Controller
{
    private TrainerModel $trainerModel;
    private PhpRenderer $renderer;

    public function __construct(TrainerModel $trainerModel, PhpRenderer $renderer)
    {
        $this->trainerModel = $trainerModel;
        $this->renderer = $renderer;
    }

    public function __invoke(Request $request, Response $response, array $args)
    {
        $id = $args['id'];
        $trainerDetails = $this->trainerModel->getTrainerForEdit($id);
        return $this->renderer->render($response, 'editTrainer.phtml', ['trainerDetails' => $trainerDetails]);
    }
}
