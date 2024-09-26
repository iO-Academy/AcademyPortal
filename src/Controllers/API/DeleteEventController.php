<?php

namespace Portal\Controllers\API;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Portal\Models\EventModel;

class DeleteEventController
{
    private EventModel $eventModel;

    public function __construct(EventModel $eventModel)
    {
        $this->eventModel = $eventModel;
    }

    public function __invoke(Request $request, Response $response, $args)
    {
        $this->eventModel->deleteEvent(intval($args['id']));
        return $response->withHeader('Location', '/events')->withStatus(301);
    }
}
