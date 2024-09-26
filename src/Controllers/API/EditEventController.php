<?php

namespace Portal\Controllers\API;
use Portal\Models\EventModel;
use Portal\Abstracts\Controller;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
class EditEventController extends Controller
{
    private EventModel $eventModel;

    function __construct(EventModel $eventModel)

    {
        $this->eventModel= $eventModel;
    }

    public function __invoke(Request $request, Response $response, array $args)
    {
        $eventData = $request->getParsedBody();
        $this->eventModel->editEvent($eventData);
        return $response->withHeader('Location', "/events/".$args["id"]);
    }
}