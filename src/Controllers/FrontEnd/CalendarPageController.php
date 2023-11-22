<?php

namespace Portal\Controllers\FrontEnd;

use Portal\Abstracts\Controller;
use Portal\Models\CourseModel;
use Portal\Models\EventModel;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Views\PhpRenderer;

class CalendarPageController extends Controller
{
    private PhpRenderer $renderer;
    private EventModel $eventModel;

    public function __construct(PhpRenderer $renderer, EventModel $eventModel)
    {
        $this->renderer = $renderer;
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
            return $this->renderer->render($response, 'calendar.phtml', $args);
        } else {
            return $response->withHeader('Location', './')->withStatus(301);
        }
    }
}
