<?php

namespace Portal\Controllers;

use Portal\Abstracts\Controller;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Views\PhpRenderer;
use Portal\Models\EventModel;
use Portal\Entities\EventEntity;

class AddEventController extends Controller
{
    private $eventModel;

    /**
     * AddEventController constructor
     *
     * @param EventModel $eventModel
     */
    public function __construct(EventModel  $eventModel)
    {
        $this->eventModel = $eventModel;
    }

    public function __invoke(Request $request, Response $response, array $args)
    {
        $newEvent = $request->getParsedBody();
        $responseData = [
            'success' => false,
            'message' => 'There was an Error!',
            'data' => []
        ];
        $statusCode = 400;

        try {
            $event = new EventEntity(
                $newEvent['id'] ?? '',
                $newEvent['name'],
                $newEvent['category'],
                $newEvent['location'],
                $newEvent['date'],
                $newEvent['startTime'],
                $newEvent['endTime'],
                $newEvent['notes'],
                $this->eventModel->getEventCategories()
            );
            if (!empty($event) && $event instanceof EventEntity) {
                $result = $this->eventModel->addEvent($event);
            }
        } catch (\Exception $exception) {
            $responseData['message'] = $exception->getMessage();
        }

        if (isset($result) && $result) {
            $responseData = [
                'success' => true,
                'message' => 'New Event successfully added to the database.',
                'data' => []
            ];
            $statusCode = 201;
        }
        return $this->respondWithJson($response, $responseData, $statusCode);
    }
}
