<?php 

namespace Portal\Controllers;

use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Views\PhpRenderer;

class DisplayEventsPageController
{
    private $renderer;
    private $eventsModel;

    public function __construct(PhpRenderer $renderer, EventsModel $eventsModel)
    {
        $this->renderer = $renderer;
        $this->eventsModel = $eventsModel;
    }

    public function __invoke(Request $request, Response $response, array $args) :Response
    {
        {
            if ($_SESSION['loggedIn'] === true) {
                $args['eventCategory'] = $this->eventsModel->getEventCategories();
                $this->renderer->render($response, 'createEventsPage.phtml', $args);
            } else {
                return $response->withRedirect('/');
            }
    }


}