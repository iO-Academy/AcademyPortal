<?php

namespace Portal\Controllers;

use Portal\Models\EventModel;
use Portal\Validators\EventValidator;
use Slim\Http\Request;
use Slim\Http\Response;

class AddEventController
{
    private $eventModel;

    /**
     * AddEventController constructor.
     * @param $eventModel
     */
    public function __construct(EventModel $eventModel)
    {
        $this->eventModel = $eventModel;
    }

    public function __invoke(Request $request, Response $response)
    {

        $data = ['success' => false, 'msg' => 'Event not created', 'data' => []];
        $statusCode = 406;

        $newEventData = $request->getParsedBody();

        if (!EventValidator::validTime($newEventData['startTime']) || !EventValidator::validTime($newEventData['endTime'])) {
            $data['msg'] = 'Time not in correct format';
            return $response->withJson($data, $statusCode);
        }

        if (EventValidator::startAfterEndTime($newEventData['startTime'], $newEventData['endTime'])) {
            $data['msg'] = 'Start time not before end time';
            return $response->withJson($data, $statusCode);
        }

        if (EventValidator::dateInPast($newEventData['date'])) {
            $data['msg'] = 'Date not in past';
            return $response->withJson($data, $statusCode);
        }

        if (EventValidator::isFieldEmpty($newEventData['eventName'], $newEventData['location'])) {
            $data['msg'] = 'Event location or name is empty';
            return $response->withJson($data, $statusCode);
        }

        $validatedEventData = [
            'eventName' => filter_var($newEventData['eventName'], FILTER_SANITIZE_STRING),
            'date' => filter_var($newEventData['date'], FILTER_SANITIZE_STRING),
            'location' => filter_var($newEventData['location'], FILTER_SANITIZE_STRING),
            'type' => filter_var($newEventData['type'], FILTER_SANITIZE_NUMBER_INT),
            'startTime' => $newEventData['startTime'],
            'endTime' => $newEventData['endTime'],
            'notes' => filter_var($newEventData['notes'], FILTER_SANITIZE_STRING)
        ];

        $successfulRegister = $this->eventModel->insertNewEventToDb($validatedEventData);

        if ($successfulRegister) {
            $data = [
                'success' => $successfulRegister,
                'msg' => "New event added name: ". $validatedEventData['eventName'],
                'data' => []
            ];
            $statusCode = 200;
        } else {
            $data['msg'] = 'Failed to add event to database';
        }

        return $response->withJson($data, $statusCode);
    }


}
