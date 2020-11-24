<?php

namespace Portal\Controllers;

use Portal\Abstracts\Controller;
use Portal\Models\StageModel;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class GetNextStageOptionsController extends Controller
{
    private $stageModel;

    /**
     * GetEventsController constructor.
     *
     * @param StageModel $stageModel
     */

    public function __construct(StageModel $stageModel)
    {
        $this->stageModel = $stageModel;
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
            'message' => 'Something went wrong. This is new',
            'data' => []
        ];
        $statusCode = 200;
//        var_dump('---------------------');
//        var_dump($data);
//        var_dump('---------------------');
        $data['data'] = $this->stageModel->getOptionsByStageID(3);


//        $pastEvents = $request->getQueryParams()['past'] ?? '';
//
//        $eventSearchInput = $request->getQueryParams()['searchTerm'] ?? '';
//        if (!empty($eventSearchInput)) {
//            if (strlen($eventSearchInput) < 256) {
//                try {
//                    if (!$pastEvents) {
//                        $data['data'] = $this->stageModel->searchFutureEvents($eventSearchInput);
//                    } else {
//                        $data['data'] = $this->stageModel->searchPastEvents($eventSearchInput);
//                    }
//
//                    $data['message'] = 'No results returned matching your search';
//                    if (count($data['data']) > 0) {
//                        $data['message'] = '';
//                    }
//                } catch (\PDOException $exception) {
//                    $data['message'] = $exception->getMessage();
//                }
//            } else {
//                $data['message'] = 'Search term cannot be greater than 255 characters.';
//            }
//            return $this->respondWithJson($response, $data, $statusCode);
//        }
//
//
//        try {
//            if (!$pastEvents) {
//                $data['data'] = $this->stageModel->getOptionsByStageID(3);
//            } else {
//                $data['data'] = $this->stageModel->getPastEvents();
//            }
//
//            $data['message'] = 'No events scheduled';
//            $data['success'] = true;
//
//            if (count($data['data']) > 0) {
//                $data['message'] = '';
//            }
//        } catch (\PDOException $exception) {
//            $data['message'] = $exception->getMessage();
//        }
        return $this->respondWithJson($response, $data, $statusCode);
    }
}
