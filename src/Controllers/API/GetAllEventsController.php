<?php

namespace Portal\Controllers\FrontEnd;

use Portal\Abstracts\Controller;
use Portal\Models\EventModel;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Views\PhpRenderer;

class GetAllEventsController extends Controller
{
    private EventModel $eventModel;

    public function __construct(EventModel $eventModel)
    {
        $this->eventModel = $eventModel;
    }

    /**
     * Checks for logged-in status,
     * gets all events from DB
     */
    public function __invoke(Request $request, Response $response, array $args): Response
    {
        if (!empty($_SESSION['loggedIn']) && $_SESSION['loggedIn']) {
            $args['events'] = $this->eventModel->getAllEvents();
            return $this->respondWithJson($response, $args);
        } else {
            return $response->withHeader('Location', './')->withStatus(301);
        }
    }
}
