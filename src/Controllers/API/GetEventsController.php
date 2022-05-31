<?php

namespace Portal\Controllers\API;

use Portal\Abstracts\Controller;
use Portal\Models\EventModel;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class GetEventsController extends Controller
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
        $statusCode = 200;

        $pastEvents = $request->getQueryParams()['past'] ?? '';

        $eventSearchInput = $request->getQueryParams()['searchTerm'] ?? '';
        $eventFilterInput = $request->getQueryParams()['categoryValue'] ?? null;
        if (strlen($eventSearchInput) < 256) {
            try {
                if (!$pastEvents) {
                    $data['data'] = $this->eventModel->getUpcomingEventsByCategoryIdAndSearch(
                        $eventFilterInput,
                        $eventSearchInput
                    );
                } else {
                    $data['data'] = $this->eventModel->getPastEventsByCategoryIdAndSearch(
                        $eventFilterInput,
                        $eventSearchInput
                    );
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
