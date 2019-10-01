<?php

namespace Portal\Controllers;

use Portal\Models\EventModel;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Views\PhpRenderer;

class DisplayEventsPageController
{
    private $renderer;
    private $eventModel;
    
    /**
     * Creates new instance of DisplayEventsPageController
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
    public function __invoke(Request $request, Response $response, array $args) : Response
    {
        if ($_SESSION['loggedIn'] === true) {
            $args['eventCategories'] = $this->eventsModel->getEventCategories();
            $this->renderer->render($response, 'createEventsPage.phtml', $args);
        } else {
            return $response->withRedirect('/');
        }
    }
}
