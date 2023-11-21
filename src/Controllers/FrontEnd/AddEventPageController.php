<?php

namespace Portal\Controllers\FrontEnd;

use Portal\Abstracts\Controller;
use Portal\Models\EventModel;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Views\PhpRenderer;

class AddEventPageController extends Controller
{
    private PhpRenderer $renderer;
    private EventModel $eventModel;

    /**
     * Creates new instance of EventsPageController
     */
    public function __construct(PhpRenderer $renderer, EventModel $eventModel)
    {
        $this->renderer = $renderer;
        $this->eventModel = $eventModel;
    }

    /**
     * Checks for logged-in status,
     * gets event categories from DB
     * and returns rendered landing screen for Events page
     */
    public function __invoke(Request $request, Response $response, array $args): Response
    {
        if (!empty($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) {
            $args['eventCategories'] = $this->eventModel->getEventCategories();
            return $this->renderer->render($response, 'addEvent.phtml', $args);
        } else {
            return $response->withHeader('Location', './')->withStatus(301);
        }
    }
}
