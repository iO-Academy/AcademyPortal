<?php
namespace Portal\Controllers;
use Portal\Models\EventListModel;
use Slim\Http\Response;
use Slim\Http\Request;
use Slim\Views\PhpRenderer;


class EventListController
{
    private $renderer;
    private $eventListModel;

    public function __construct(PhpRenderer $renderer, EventListModel $eventListModel)
    {
        $this->eventListModel = $eventListModel;
        $this->renderer = $renderer;
    }

    public function __invoke(Request $request, Response $response, array $args)
    {
        $eventData = $this->eventListModel->getEventData();
        $args['events'] = $eventData;
        return $this->renderer->render($response, 'EventList.phtml', $args);
    }

}