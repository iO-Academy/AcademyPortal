<?php

namespace Portal\Controllers;

use Portal\Models\EventModel;
use Slim\Http\Request;
use Slim\Http\Response;

class LinkHiringPartnerToEventController
{
    private $EventModel;

    public function __construct(EventModel $EventModel)
    {
        $this->EventModel = $EventModel;
    }
    
    /**
     * Calls a method to send hiring partner id, event id and number of attendees
     *
     * and responds with Json success message
     *
     * @param Request $request HTTP request
     * @param Response $response HTTP response
     * @param array $args
     *
     * @return Response returns Json success/failure message
     */
    public function __invoke(Request $request, Response $response, array $args) :Response
    {
        $hiringPartner = $request->getParsedBody()['companyId'];
        $event = $request->getParsedBody()['eventId'];
        $attendees = $request->getParsedBody()['attendees'];
        $result = $this->toDoModel->linkHPToEvent($hiringPartner, $event, $attendees);
        if ($result) {
            return $response->withJson(['success' => 'True'], 200);
        } else {
            return $response->withJson([['success' => 'False'], 200);
        }
    }
}
