<?php

namespace Portal\Controllers\FrontEnd;

use Portal\Abstracts\Controller;
use Portal\Models\EventModel;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Views\PhpRenderer;

class AddEventPageController extends Controller
{
    private $renderer;
    private $eventModel;

    /**
     * Creates new instance of EventsPageController
     *
     * @param PhpRenderer $renderer
     * @param EventsModel $eventsModel
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
     *
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     */
    public function __invoke(Request $request, Response $response, array $args)
    {
        if ($_SESSION['loggedIn'] === true) {
            $args['eventCategories'] = $this->eventModel->getEventCategories();
            return $this->renderer->render($response, 'addEvent.phtml', $args);
        } else {
            return $response->withHeader('Location', './');
        }
    }
}
