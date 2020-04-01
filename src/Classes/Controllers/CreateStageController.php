<?php

namespace Portal\Controllers;

use Portal\Models\StageModel;
use Portal\Entities\StageEntity;
use Slim\Http\Request;
use Slim\Http\Response;

class CreateStageController
{
    private $stageModel;

    /** Constructor assigns StageModel to this object
     *
     * CreateStageController constructor.
     * @param StageModel $stageModel
     */
    public function __construct(StageModel $stageModel)
    {
        $this->stageModel = $stageModel;
    }

    /** On invoke, check request input for Title value, then create new StageEntity with incremented
     * order number to send to DB via StageModel
     *
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response - with json and status 200/500 for success or failure.
     */
    public function __invoke(Request $request, Response $response, array $args)
    {
        $requestData = $request->getParsedBody();
        $data = [
            'success' => false,
            'message' => 'Error!',
            'data' => []
        ];
        $statusCode = 500;

        if ($_SESSION['loggedIn'] === true) {
            if (isset($requestData['title']) && strlen($requestData['title'] > 0)) {
                $highestOrder = $this->stageModel->getHighestOrderNo();
                $newStage = new StageEntity($requestData['title'], ++$highestOrder);
                if ($this->stageModel->createStage($newStage)) {
                    $data = [
                        'success' => true,
                        'message' => 'Stage added successfully',
                    ];
                    $statusCode = 200;
                } else {
                    $data = [
                        'message' => 'Error adding to database',
                    ];
                }

                return $response->withJson($data, $statusCode);
            }
        }
    }
}