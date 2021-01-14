<?php

namespace Portal\Controllers\FrontEnd;

use Portal\Abstracts\Controller;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Views\PhpRenderer;
use Portal\Models\StageModel;

class StagesPageController extends Controller
{
    private $renderer;
    private $stageModel;

    /**
     * StagesPageController constructor.
     *
     * @param PhpRenderer $renderer
     *
     * @param StageModel $stageModel
     */
    public function __construct(PhpRenderer $renderer, StageModel $stageModel)
    {
        $this->renderer = $renderer;
        $this->stageModel = $stageModel;
    }

    /**
     * Renders stages page on the front end in editStages.phtml
     *
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function __invoke(Request $request, Response $response, array $args)
    {
        if ($_SESSION['loggedIn'] === true) {
            $args['data'] = $this->stageModel->getAllStages();
            return $this->renderer->render($response, 'editStages.phtml', $args);
        } else {
            return $response->withHeader('Location', '/');
        }
    }
}
