<?php

namespace Portal\Controllers;

use Portal\Entities\HiringPartnerEntity;
use Portal\Models\EventModel;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class RemoveHiringPartnerFromEventController
{
    private $eventModel;

    public function __construct(EventModel $eventModel)
    {
        $this->eventModel = $eventModel;
    }

    /**
     * Calls a method to remove hiring partner from the event
     *
     * and responds with Json success message
     *
     * @param Request $request HTTP request
     * @param Response $response HTTP response
     * @param array $args The arguments array
     *
     * @return Response returns Json success/failure message
     */
    public function __invoke(Request $request, Response $response, array $args): Response
    {
        $data = $request->getParsedBody();
        $hiringPartner = $data['hp_id'];
        $event = $data['event_id'];

        $result = $this->eventModel->removeHiringPartnerFromEvent($event, $hiringPartner);

        if ($result) {
            $response->getBody()->write(json_encode(['success' => true,
                'message' => 'Hiring partner successfully removed from the event.',
                'data' => [$hiringPartner, $event]]));
            return $response->withStatus(200);
        } else {
            $response->getBody()->write(json_encode(['success' => false,
                'message' => 'Error - please contact administrator']));
            return $response->withStatus(500);
        }
    }
}
