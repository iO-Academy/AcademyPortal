<?php


namespace Portal\Controllers;

use Slim\Http\Request;
use Slim\Http\Response;

class GetEventsInfoController
{
    private $eventsModel;

    public function __construct($eventsModel)
    {
        $this->eventsModel = $eventsModel;
    }

    public function __invoke(Request $request, Response $response, array $args)
    {
        $data = [
            'status' => false,
            'message' => 'No events found!',
            'data' => []
        ];
        $statusCode = 400;

        try {
            $events = $this->eventsModel->getEvents();
        } catch (\PDOException $exception) {
            $data['message'] = $exception->getMessage();
        }

        if (!empty($events)) {
            $data = [
                'status' => true,
                'message' => 'Query Successful',
                'data' => $events
            ];
            $statusCode = 200;
        }

        return $response->withJson($data, $statusCode);
    }
}
