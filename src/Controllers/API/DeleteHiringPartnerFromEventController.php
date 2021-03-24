<?php

namespace Portal\Controllers\API;

use Portal\Abstracts\Controller;
use Portal\Models\EventModel;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class DeleteHiringPartnerFromEventController extends Controller
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
            $data = ['success' => true,
                'message' => 'Hiring partner successfully removed from the event.',
                'data' => [$hiringPartner, $event]];
            return $this->respondWithJson($response, $data);
        } else {
            $data = ['success' => false,
                'message' => 'Error - please contact administrator'];
            return $this->respondWithJson($response, $data, 500);
        }
    }
}
