<?php

namespace Portal\Controllers\API;

use Portal\Abstracts\Controller;
use Portal\Models\EventModel;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class AddHiringPartnerToEventController extends Controller
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
        $responseData = [
            'success' => false,
            'message' => 'Unexpected Error.',
            'data' => []
        ];
        $statusCode =  500;

        $data = $request->getParsedBody();

        if (empty($data['hiring_partner_id']) || empty($data['event_id']) || empty($data['people_attending'])) {
            $responseData['message'] = 'Missing data';
            $statusCode = 400;
        } else {
            $hiringPartner = $data['hiring_partner_id'];
            $event = $data['event_id'];
            $attendees = $data['people_attending'];

            if (!$this->eventModel->checkLinkHP($hiringPartner, $event)) {
                $result = $this->eventModel->addHPToEvent($hiringPartner, $event, $attendees);
            } else {
                $responseData['message'] = 'Hiring partner already linked.';
                $statusCode = 200;
            }
            if ($result) {
                $responseData['success'] = true;
                $responseData['message'] = 'Hiring Partner linked successfully.';
                $statusCode = 200;
            }
        }
        return $this->respondWithJson($response, $responseData, $statusCode);
    }
}
