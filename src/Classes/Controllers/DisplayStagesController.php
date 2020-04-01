<?php

namespace Portal\Controllers;

use \Slim\Http\Request as Request;
use \Slim\Http\Response as Response;
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

    public function __invoke(Request $request, Response $response, array $args)
    {
        $args = $this->stageModel->getAllStages();
        return $this->renderer->render($response, 'displayStages.phtml', $args);
    }
}
