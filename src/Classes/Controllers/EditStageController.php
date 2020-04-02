<?php

namespace Portal\Controllers;

use Portal\Entities\StageEntity;
use Portal\Entities\ValidationEntity;
use \Slim\Http\Request as Request;
use \Slim\Http\Response as Response;
use Portal\Models\StageModel;
use mysql_xdevapi\Exception;

class EditStageController extends ValidationEntity
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
        if ($_SESSION['loggedIn'] === true) {
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


                    if (isset($stageObject['id']) && isset($stageObject['title']) && isset($stageObject['order'])) {

                        $stageObject['id'] = (int) $stageObject['id'];
                        $stageObject['title'] = self::sanitiseString($stageObject['title']);
                        try {
                            $stageObject['title'] = self::validateLength($stageObject['title'], 255);
                        } catch (\Exception $exception) {
                            $stageObject['title'] = substr($stageObject['title'], 0, 254);
                        }

                        $stageObject['order'] = (int) $stageObject['order'];

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
    }

    /**
     * Will sanitise all the fields for a stage.
     */
    private function sanitiseData()
    {
        $this->id = (int) $this->id;
        $this->title = self::sanitiseString($this->title);

        try {
            $this->title = self::validateLength($this->title, 255);
        } catch (\Exception $exception) {
            $this->title = substr($this->title, 0, 254);
        }

        $this->order = (int) $this->order;
        $this->deleted = (int) $this->deleted;
    }
}
