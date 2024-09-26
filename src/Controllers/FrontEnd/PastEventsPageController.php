<?php

namespace Portal\Controllers\FrontEnd;

use Portal\Abstracts\Controller;
use Portal\Models\EventModel;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Views\PhpRenderer;

class PastEventsPageController extends Controller
{
    private PhpRenderer $renderer;
    private EventModel $model;

    public function __construct(PhpRenderer $renderer, EventModel $model)
    {
        $this->renderer = $renderer;
        $this->model = $model;
    }

    /**
     * Checks for logged-in status,
     * gets event categories from DB
     * and returns rendered landing screen for Events page
     */
    public function __invoke(Request $request, Response $response, array $args): Response
    {
        if (!empty($_SESSION['loggedIn']) && $_SESSION['loggedIn']) {
            $args['eventType'] = 'Past';
            $args['maxPages'] = $this->model->getMaxCountPastEvents();
            return $this->renderer->render($response, 'events.phtml', $args);
        } else {
            return $response->withHeader('Location', './')->withStatus(301);
        }
    }
}
