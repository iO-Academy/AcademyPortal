<?php
/**
 * Created by PhpStorm.
 * User: academy
 * Date: 27/11/2018
 * Time: 11:17
 */

namespace Portal\Controllers;

use Portal\Models\EventModel;
use Portal\Validators\EventValidator;
use Slim\Http\Request;
use Slim\Http\Response;

class AddEventController
{
    private $eventModel;

    /**
     * EventModelController constructor.
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
            return $response->withJson($data, $statusCode);
        }

        if (EventValidator::startAfterEndTime($newEventData['startTime'], $newEventData['endTime'])) {
            return $response->withJson($data, $statusCode);
        }

        if (EventValidator::dateNotInPast($newEventData['date'])) {
            return $response->withJson($data, $statusCode);
        }

        if (EventValidator::checkFieldNotEmpty($newEventData['location'], $newEventData('eventName'))) {
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
        }

        return $response->withJson($data, $statusCode);
    }


}
