<?php

namespace Portal\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Views\PhpRenderer;
use Portal\Models\StageModel;

class DisplayStagesController
{
    private $renderer;
    private $stageModel;

    /**
     * DisplayStagesController constructor.
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
     * Renders stages page on the front end in stagesPage.phtml
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
            return $this->renderer->render($response, 'stagesPage.phtml', $args);
        } else {
            return $response->withHeader('Location', '/');
        }
    }
}