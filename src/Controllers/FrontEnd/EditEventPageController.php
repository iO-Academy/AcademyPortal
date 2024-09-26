<?php

namespace Portal\Controllers\FrontEnd;

use Portal\Abstracts\Controller;
use Portal\Models\EventModel;
use Slim\Views\PhpRenderer;

class EditEventPageController extends Controller
{
    private EventModel $eventModel;
    private PhpRenderer $renderer;

    public function __construct(EventModel $eventModel, PhpRenderer $renderer)
    {
        $this->eventModel = $eventModel;
        $this->renderer = $renderer;
    }

    public function __invoke($request, $response, $args)
    {
        $id = $args['id'];
        $editEvent = $this->eventModel->getEventForEdit($id);
        return $this->renderer->render($response, 'editEvents.phtml', ['editEvent' => $editEvent]);
    }
}