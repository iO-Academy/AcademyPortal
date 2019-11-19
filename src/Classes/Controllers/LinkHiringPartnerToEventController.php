<?php

namespace Portal\Controllers;

use Portal\Models\EventModel;
use Slim\Http\Request;
use Slim\Http\Response;

class LinkHiringPartnerToEventController
{
    private $eventModel;

    public function __construct(EventModel $eventModel)
    {
        $this->eventModel = $eventModel;
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
        $data = $request->getParsedBody();
        $hiringPartner = $data['hiring_partner_id'];
        $event = $data['events_id'];
        $attendees = $data['people_attending'];
        $result = $this->eventModel->linkHPToEvent($hiringPartner, $event, $attendees);
        if ($result) {
            return $response->withJson(['success' => 'True'], 200);
        } else {
            echo 'Something went wrong, please check and try again';
            return $response->withJson(['success' => 'False'], 500);
        }
    }
}
