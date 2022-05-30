<?php

namespace Portal\Controllers\API;

use Portal\Abstracts\Controller;
use Portal\Models\EventCategoriesModel;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class GetEventCategoriesController extends Controller
{
    private EventCategoriesModel $eventCategoriesModel;

    /**
     * @param EventCategoriesModel $eventCategoriesModel
     */
    public function __construct(EventCategoriesModel $eventCategoriesModel)
    {
        $this->eventCategoriesModel = $eventCategoriesModel;
    }

    public function __invoke(Request $request, Response $response, array $args)
    {
        $data = [
            'success' => false,
            'message' => 'Something went wrong.',
            'data' => []
        ];
        $statusCode = 200;
        try {
            $data['data'] = $this->eventCategoriesModel->getEventCategories();
            $data['message'] = 'No results returned matching your search';
            if (count($data['data']) > 0) {
                $data['message'] = '';
            }
            $data['success'] = true;
        } catch (\PDOException $exception) {
            $data['message'] = $exception->getMessage();
        }

        return $this->respondWithJson($response, $data, $statusCode);
    }
}
