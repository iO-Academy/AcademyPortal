<?php


namespace Portal\Controllers;

use Slim\Http\Request;
use Slim\Http\Response;

class GetEventController
{
    private $eventsModel;

    public function __construct($eventModel)
    {
        $this->eventModel = $eventModel;
    }

    public function __invoke(Request $request, Response $response, array $args)
    {
        $data = [
            'success' => false,
            'message' => 'No events found!',
            'data' => []
        ];
        $statusCode = 400;

        try {
            $events = $this->eventModel->getEvents();
        } catch (\PDOException $exception) {
            $data['message'] = $exception->getMessage();
        }

        if (!empty($events)) {
            $data = [
                'success' => true,
                'message' => 'Query Successful',
                'data' => $events
            ];
            $statusCode = 200;
        }

        return $response->withJson($data, $statusCode);
    }
}
