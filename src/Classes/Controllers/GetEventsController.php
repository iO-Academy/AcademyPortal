<?php


namespace Portal\Controllers;

use Portal\Models\EventModel;
use Slim\Http\Request;
use Slim\Http\Response;

class GetEventsController
{
    private $eventModel;

    /**
     * GetEventsController constructor.
     *
     * @param EventModel $eventModel
     */

    public function __construct(EventModel $eventModel)
    {
        $this->eventModel = $eventModel;
    }
    /**
     * Calls a method to get all the events and send JSON back with the info
     *
     * @param Request $request HTTP request
     * @param Response $response HTTP response
     * @param array $args
     * @return Response returns JSON with hiring partner data
     */
    public function __invoke(Request $request, Response $response, array $args)
    {
        $data = [
            'success' => false,
            'message' => 'Something went wrong.',
            'data' => []
        ];
        $statusCode = 400;

        $eventSearchInput = $request->getQueryParam('searchTerm');
        if (!empty($eventSearchInput)) {
            if (strlen($eventSearchInput) < 256) {
            // run the search event function
                $searchEvents = $this->eventModel->searchEvents($eventSearchInput);
                if (!empty($eventSearchInput)) {
                    $data = [
                        'success' => true,
                        'message' => 'Query Successful.',
                        'data' => $eventSearchInput
                    ];
                    $statusCode = 200;
                } else {
                    $data = [
                        'success' => true,
                        'message' => 'There are no events.',
                        'data' => []
                    ];
                    $statusCode = 200;
                }
                return $response->withJson($data, $statusCode);
            } else {
                $data['message'] = 'Search term cannot be greater than 255 characters.';
                return $response->withJson($data, $statusCode);
            }
        } else {
            try {
                $events = $this->eventModel->getEvents();
            } catch (\PDOException $exception) {
                $data['message'] = $exception->getMessage();
                return $response->withJson($data, $statusCode);
            }
        }

        if (!empty($events)) {
            $data = [
                'success' => true,
                'message' => 'Query Successful.',
                'data' => $events
            ];
            $statusCode = 200;
        } else {
            $data = [
                'success' => true,
                'message' => 'There are no events.',
                'data' => []
            ];
            $statusCode = 200;
        }
        return $response->withJson($data, $statusCode);
    }
}
