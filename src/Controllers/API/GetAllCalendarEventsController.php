<?php

namespace Portal\Controllers\API;

use Portal\Abstracts\Controller;
use Portal\Models\EventModel;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class GetAllCalendarEventsController extends Controller
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
        $statusCode = 200;

        if (!empty($_SESSION['loggedIn']) && $_SESSION['loggedIn']) {
            $data = $this->eventModel->getAllCalendarEvents();
            return $this->respondWithJson($response, $data, $statusCode);
        } else {
            return $response->withHeader('Location', './')->withStatus(301);
        }
    }
}
