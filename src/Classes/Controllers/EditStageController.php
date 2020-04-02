<?php

namespace Portal\Controllers;

use Portal\Entities\StageEntity;
use \Slim\Http\Request as Request;
use \Slim\Http\Response as Response;
use Portal\Models\StageModel;

class EditStageController
{
    private $stageModel;

    public function __construct(StageModel $model)
    {
        $this->stageModel = $model;
    }

    /**
     * Checks if user is logged in, validates the http request data and calls
     * the updateStage method on stageModel
     *
     * @param Request $request
     * @param Response $response
     * @param array $args
     *
     * @return \Slim\Http\Response - Returns status 200/500 with message in Json
     */
    public function __invoke(Request $request, Response $response, array $args)
    {
//        if ($_SESSION['loggedIn'] === true) {
            $data = [
                'success' => false,
                'msg' => 'Stage not found.',
                'data' => []
            ];
            $statusCode = 500;

            $requestDataPackage = $request->getParsedBody();

            try {

                $this->stageModel->getDB()->beginTransaction();

                foreach ($requestDataPackage['data'] as $stageObject) {

                    if (isset($stageObject['id'])) {

                        $this->stageModel->updateStage($stageObject['id'], $stageObject['title'], $stageObject['order']);

                    }
                }

                $this->stageModel->getDB()->commit();
                //return success data package.
                $data = [
                    'success' => true,
                    'msg' => 'Stage edit successful.'
                ];
                $statusCode = 200;

                return $response->withJson($data, $statusCode);

            } catch (\PDOException $e) {
                $this->stageModel->getDB()->rollBack();
                //return error fail data package.
                $data = [
                    'msg' => 'Stage edit failed.'
                ];

                return $response->withJson($data, $statusCode);
            }
        }
//    }
}