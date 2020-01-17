<?php

namespace Portal\Controllers;

use Portal\Models\EventModel;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

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

        if (!$this->eventModel->checkLinkHP($hiringPartner, $event)) {
            $result = $this->eventModel->addHPToEvent($hiringPartner, $event, $attendees);
        } else {
            $response->getBody()->write(json_encode(['success' => false,
                'message' => 'Hiring partner already linked.']));
            return $response->withStatus(200);
        }
        
        if ($result) {
            $response->getBody()->write(json_encode(['success' => true,
                'message' => 'Hiring partner successfully added to event.']));
            return $response->withStatus(200);
        } else {
            $res = json_encode(['success' => false, 'message' => 'Error - please contact administrator']);
            $response->getBody()->write($res);
            return $response->withStatus(500);
        }
    }
}
