<?php

namespace Portal\Controllers\API;

use Portal\Abstracts\Controller;
use Portal\Models\EventModel;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class GetEventsController extends Controller
{
    private EventModel $eventModel;

    public function __construct(EventModel $eventModel)
    {
        $this->eventModel = $eventModel;
    }

    /**
     * Calls a method to get all the events and send JSON back with the info
     */
    public function __invoke(Request $request, Response $response, array $args): Response
    {
        $data = [
            'success' => false,
            'message' => 'Something went wrong.',
            'data' => []
        ];
        $statusCode = 200;

        $pastEvents = $request->getQueryParams()['past'] ?? '';

        $eventSearchInput = $request->getQueryParams()['searchTerm'] ?? '';
        $eventFilterInput = $request->getQueryParams()['categoryValue'] ?? null;
        $pageNumberInput = $args['offset'];
        if (strlen($eventSearchInput) < 256) {
            try {
                if (!$pastEvents) {
                    $data['data'] = $this->eventModel->getUpcomingEventsByCategoryIdAndSearch(
                        $pageNumberInput,
                        $eventFilterInput,
                        $eventSearchInput,
                );
                    $data['count'] = $this->eventModel->getMaxCountUpcomingEvents();

                } else {
                    $data['data'] = $this->eventModel->getPastEventsByCategoryIdAndSearch(
                        $pageNumberInput,
                        $eventFilterInput,
                        $eventSearchInput
                    );
                    $data['count'] = $this->eventModel->getMaxCountPastEvents();
                }

                $data['message'] = 'No results returned matching your search';
                if (count($data['data']) > 0) {
                    $data['message'] = '';
                }
                $data['success'] = true;
            } catch (\PDOException $exception) {
                $data['message'] = $exception->getMessage();
            }
        } else {
            $data['message'] = 'Search term cannot be greater than 255 characters.';
        }
        return $this->respondWithJson($response, $data, $statusCode);
    }
}
