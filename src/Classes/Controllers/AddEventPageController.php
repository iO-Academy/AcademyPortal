<?php

namespace Portal\Controllers;

use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Views\PhpRenderer;
use Portal\Models\EventModel;

class AddEventPageController
{
    private $renderer;
    private $eventModel;

    /**
     * addEventPageController constructor.
     * @param $renderer
     * @param $eventModel
     */
    public function __construct(PhpRenderer $renderer, EventModel $eventModel)
    {
        $this->renderer = $renderer;
        $this->eventModel = $eventModel;
    }

    /**
     * @param Request $request
     * @param Response $response
     * @param $args
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function __invoke(Request $request, Response $response, $args)
    {
        $args['dropdownData'] = $this->eventModel->getDropdownData();
        return $this->renderer->render($response, 'addEvent.phtml', $args);
    }
}