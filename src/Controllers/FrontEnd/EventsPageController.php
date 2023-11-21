<?php

namespace Portal\Controllers\FrontEnd;

use Portal\Abstracts\Controller;
use Portal\Models\EventModel;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Views\PhpRenderer;

class EventsPageController extends Controller
{
    private PhpRenderer $renderer;

    public function __construct(PhpRenderer $renderer)
    {
        $this->renderer = $renderer;
    }

    /**
     * Checks for logged-in status,
     * gets event categories from DB
     * and returns rendered landing screen for Events page
     */
    public function __invoke(Request $request, Response $response, array $args): Response
    {
        if (!empty($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) {
            $args['eventType'] = 'Upcoming';
            return $this->renderer->render($response, 'events.phtml', $args);
        } else {
            return $response->withHeader('Location', './')->withStatus(301);
        }
    }
}
