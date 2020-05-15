<?php

namespace Portal\Controllers;

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
     * Checks if user is logged in, validates the http request data and calls
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
                'msg' => 'Stage not found.',
                'data' => []
            ];
            $statusCode = 500;

            $stagesCount = $this->stageModel->stagesCount();

            if ($stagesCount['stagesCount'] <= 1) {
                $data = [
                    'msg' => 'Cannot delete last record.',
                ];
                return $this->respondWithJson($response, $data, $statusCode);
            }

            $requestData = $request->getParsedBody();

            if (isset($requestData['id'])) {
                $validatedRequestData = filter_var($requestData['id'], FILTER_VALIDATE_INT);

                if ($validatedRequestData) {
                    $stageData = $this->stageModel->getStageById($validatedRequestData);
                    if ($stageData) {
                        if ($this->stageModel->deleteStage($validatedRequestData)) {
                            $data = [
                                'success' => true,
                                'msg' => 'Stage has been deleted successfully.'
                            ];
                            $statusCode = 200;
                        }
                    }
                } else {
                    $data = [
                        'msg' => 'Invalid id provided.'
                    ];
                }
            } else {
                $data = [
                    'msg' => 'Invalid id provided.'
                ];
            }
            return $this->respondWithJson($response, $data, $statusCode);
        }
    }
}
