<?php

namespace Portal\Controllers\API;

use Portal\Abstracts\Controller;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Portal\Models\StageModel;

class DeleteStageController extends Controller
{
    private $stageModel;

    /**
     * DeleteStageController constructor.
     * @param StageModel $stageModel
     */
    public function __construct(StageModel $stageModel)
    {
        $this->stageModel = $stageModel;
    }

    /**
     * Checks if user is logged in, validates the http request data, checks if the stage has options and calls
     * the delete method on stageModel
     *
     * @param Request $request
     * @param Response $response
     * @param array $args
     *
     * @return Response - Returns status 200/500 with message in Json
     */
    public function __invoke(Request $request, Response $response, array $args)
    {
        if ($_SESSION['loggedIn'] === true) {
            $data = [
                'success' => false,
                'message' => 'Stage not found.',
                'data' => []
            ];
            $statusCode = 500;

            if ($this->stageModel->stagesCount() <= 1) {
                $data['message'] = 'Cannot delete last stage.';
                $statusCode = 400;
            } else {
                $requestData = $request->getParsedBody();
                if (isset($requestData['id']) && filter_var($requestData['id'], FILTER_VALIDATE_INT)) {
                    $stageData = $this->stageModel->getStageById($requestData['id']);
                    if ($stageData) {
                        if (empty($stageData->getOptions())) {
                            if ($this->stageModel->deleteStage($requestData['id'])) {
                                $data = [
                                    'success' => true,
                                    'message' => 'Stage has been deleted successfully.',
                                    'data' => []
                                ];
                                $statusCode = 200;
                            }
                        } else {
                            $data['message'] = 'Cannot delete stage with options still in it. Delete options first.';
                            $statusCode = 400;
                        }
                    }
                } else {
                    $statusCode = 400;
                    $data['message'] = 'Invalid id provided.';
                }
            }
            return $this->respondWithJson($response, $data, $statusCode);
        }
    }
}
