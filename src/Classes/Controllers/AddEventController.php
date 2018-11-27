<?php
/**
 * Created by PhpStorm.
 * User: academy
 * Date: 27/11/2018
 * Time: 11:17
 */

namespace Portal\Controllers;

use Portal\Models\EventModel;
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
        $newEventData = $request->getParsedBody();

        $TimeRegex = '/([0-1][0-9]|[1-2][0-3]):([0-1][0-9]|[1-5][0-9])/';

        if (!preg_match($TimeRegex, $newEventData['startTime']) || !preg_match($TimeRegex, $newEventData['endTime'])) {
            return $response->withRedirect('/');
        }

        $startIntegers =  str_replace(':', '', $newEventData['startTime']) ;
        $endIntegers = str_replace(':', '', $newEventData['endTime']);

        if ((int) $startIntegers >= (int)$endIntegers) {
            return $response->withRedirect('/');
        }

        $date = DateTime::createFromFormat('Y-m-d', $newEventData['date']);

        if (date_diff($date, new \DateTime()) < 0) {
            return $response->withRedirect('/');
        }

        $trimLocation = trim($newEventData['location']);
        $trimEventName = trim($newEventData['eventName']);

        if (empty($trimLocation) || empty($trimEventName)) {
            return $response->withRedirect('/');
        }

     $validatedUserData = [
            'eventName' => filter_var($newEventData['email'], FILTER_SANITIZE_STRING),
            'date' => filter_var($newEventData['date'], FILTER_SANITIZE_STRING),
            'location' => filter_var($newEventData['location'], FILTER_SANITIZE_STRING),
            'type' => filter_var($newEventData['type'], FILTER_SANITIZE_NUMBER_INT),
            'startTime' => $newEventData['startTime'],
            'endTime' => $newEventData['endTime'],
            'notes' => filter_var($newEventData['notes'], FILTER_SANITIZE_STRING)
        ];

    }


}
