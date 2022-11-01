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

    /**
     * Creates new instance of EventsPageController
     *
     * @param PhpRenderer $renderer
     */
    public function __construct(PhpRenderer $renderer)
    {
        $this->renderer = $renderer;
    }

    /**
     * Checks for logged-in status,
     * gets event categories from DB
     * and returns rendered landing screen for Events page
     *
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     */
    public function __invoke(Request $request, Response $response, array $args)
    {
        if ($_SESSION['loggedIn'] === true) {
            $args['eventType'] = 'Past';
            return $this->renderer->render($response, 'events.phtml', $args);
        } else {
            return $response->withHeader('Location', './');
        }
    }
}
