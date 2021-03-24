<?php

namespace Portal\Controllers\API;

use Portal\Abstracts\Controller;
use Portal\Sanitisers\EventSanitiser;
use Portal\Validators\EventValidator;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Portal\Models\EventModel;

class AddEventController extends Controller
{
    private $eventModel;

    /**
     * AddEventController constructor
     *
     * @param EventModel $eventModel
     */
    public function __construct(EventModel $eventModel)
    {
        $this->eventModel = $eventModel;
    }

    public function __invoke(Request $request, Response $response, array $args)
    {
        $newEvent = $request->getParsedBody();
        $responseData = [
            'success' => false,
            'message' => 'Unexpected Error.',
            'data' => []
        ];
        $statusCode = 400;

        try {
            if (
                EventValidator::validate($newEvent) &&
                EventValidator::validateCategoryExists(
                    $newEvent['category'],
                    $this->eventModel->getEventCategories()
                )
            ) {
                $newEvent = EventSanitiser::sanitise($newEvent);
                $result = $this->eventModel->addEvent($newEvent);
            }
        } catch (\Exception $exception) {
            $responseData['message'] = $exception->getMessage();
        }

        if (isset($result) && $result) {
            $responseData = [
                'success' => true,
                'message' => 'New Event successfully saved.',
                'data' => []
            ];
            $statusCode = 200;
        }
        return $this->respondWithJson($response, $responseData, $statusCode);
    }
}
