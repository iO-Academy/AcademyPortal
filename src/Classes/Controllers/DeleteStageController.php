<?php

namespace Portal\Controllers;

use \Slim\Http\Request as Request;
use \Slim\Http\Response as Response;
use Portal\Models\StageModel;

class DeleteStageController
{
    private $stageModel;

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
     * @return \Slim\Http\Response - Returns status 200/500 with message in Json
     */
    public function __invoke(Request $request, Response $response, array $args)
    {
        if ($_SESSION['loggedIn'] === true) {
            $data = [
                'success' => false,
                'msg' => 'Applicant not found.',
                'data' => []
            ];
            $statusCode = 500;

            $requestData = $request->getParsedBody();

            if (isset($requestData['id'])) {
                $validatedRequestData = filter_var($requestData['id'], FILTER_VALIDATE_INT);

                if ($validatedRequestData) {
                    $applicantData = $this->stageModel->getStageById($validatedRequestData);
                    if ($applicantData) {
                        if ($this->stageModel->deleteStage($validatedRequestData)) {
                            $data = [
                                'success' => true,
                                'msg' => 'Stage has been deleted successfully.',
                                'data' => []
                            ];
                            $statusCode = 200;
                        }
                    }
                } else {
                    $data = [
                        'success' => false,
                        'msg' => 'Invalid id provided.',
                        'data' => []
                    ];
                }
            } else {
                $data = [
                    'success' => false,
                    'msg' => 'Invalid id provided.',
                    'data' => []
                ];
            }
            return $response->withJson($data, $statusCode);
        }
    }
}
