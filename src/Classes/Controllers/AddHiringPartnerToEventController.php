<?php

namespace Portal\Controllers;

use Portal\Models\EventModel;
use Slim\Http\Request;
use Slim\Http\Response;

class AddHiringPartnerToEventController
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
    public function __invoke(Request $request, Response $response, array $args): Response
    {
        $data = $request->getParsedBody();
        $hiringPartner = $data['hiring_partner_id'];
        $event = $data['event_id'];
        $attendees = $data['people_attending'];

        if (!$this->eventModel->checklinkHP($hiringPartner, $event)) {
            $result = $this->eventModel->linkHPToEvent($hiringPartner, $event, $attendees);
        } else {
            return $response->withJson(['success' => true,
                'message' => 'Hiring partner already linked.'], 200);
        }
        $result = $this->eventModel->linkHPToEvent($hiringPartner, $event, $attendees);
        if ($result) {
            return $response->withJson(['success' => true,
                'message' => 'Hiring partner successfully added to event.'], 200);
        } else {
            return $response->withJson(['success' => false, 'message' => 'Error - please contact administrator'], 500);
        }
    }
}
