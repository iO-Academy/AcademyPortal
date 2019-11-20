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
            'data' => [],
            'searchPerformed' => false,
            'eventsFound' => false
        ];
        $statusCode = 400;

        $eventSearchInput = $request->getQueryParam('searchTerm');
        if (!empty($eventSearchInput)) {  // if a search has been performed do next line
            if (strlen($eventSearchInput) < 256) { // if the search input is less than 256 chars then do next line
                try {
                    $events = $this->eventModel->searchEvents($eventSearchInput); // try to get the events from the database which match the search term and put it in the $events variable
                    if (count($events) === 0) { // if the returned array is empty (i.e. no events match search)
                        $data['searchPerformed'] = true;// this means that a search was performed BUT no events match the search (used later on as a condition)
                        $data['eventsFound'] = false; // no events returned
                    } else {
                        $data['searchPerformed'] = true;// this means that a search was not performed
                        $data['eventsFound'] = true; // no events returned
                    }
                } catch (\PDOException $exception) { // this handles any db errors
                    $data['message'] = $exception->getMessage();
                    return $response->withJson($data, $statusCode);
                }
            } else { // if the length of the search input is longer than 255 characters do next line
                $data['message'] = 'Search term cannot be greater than 255 characters.'; // <- set the data array message to this
                return $response->withJson($data, $statusCode); // jump out here, sending the data array as JSON data to the front end
            }
        } else { // if no search has been performed (i.e. page load or refresh do next line
            try {
                $events = $this->eventModel->getEvents(); // try to get all the events from the db and put them in the $events variable
                if (count($events) === 0) { // if the returned array is empty (i.e. no events match search)
                    $data['searchPerformed'] = false;// this means that a search was not performed
                    $data['eventsFound'] = false; // no events returned
                } else { // if the returned array contains events
                    $data['searchPerformed'] = false;// this means that a search was not performed
                    $data['eventsFound'] = true; // no events returned
                }
            } catch (\PDOException $exception) { // this handles any db errors
                $data['message'] = $exception->getMessage();
                return $response->withJson($data, $statusCode);
            }
        }

        if ($data['searchPerformed'] === true && $data['eventsFound'] === false) {
            $data['message'] = 'No results returned matching your search';
//            $data['data'] = 'noSearchResults';
        } else if ($data['searchPerformed'] === true && $data['eventsFound'] === true) {
            $data['message'] = 'Query successful';
            $data['data'] = $events;
        } else if ($data['searchPerformed'] === false && $data['eventsFound'] === false) {
            $data['message'] = 'No events scheduled';
            $data['data'] = '';
        } else if ($data['searchPerformed'] === false && $data['eventsFound'] === true) {
            $data['message'] = 'Query successful';
            $data['data'] = $events;
        }
        $data['success'] = true;
        $statusCode = 200;
        return $response->withJson($data, $statusCode);
    }
}
