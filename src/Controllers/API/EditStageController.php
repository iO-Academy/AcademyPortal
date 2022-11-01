<?php

namespace Portal\Controllers\API;

use Portal\Abstracts\Controller;
use Portal\Validators\StageValidator;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Portal\Models\StageModel;

class EditStageController extends Controller
{
    private StageModel $stageModel;

    public function __construct(StageModel $model)
    {
        $this->stageModel = $model;
    }

    /**
     * Checks if user is logged in, validates the http request data and calls
     * the updateStage method on stageModel
     */
    public function __invoke(Request $request, Response $response, array $args): Response
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
                $stages = StageValidator::validateStages($requestDataPackage['data']);
                $this->stageModel->updateAllStages($stages);
                $data = [
                    'success' => true,
                    'msg' => 'Stage edit successful.',
                    'data' => ''
                ];
                $statusCode = 200;

                return $this->respondWithJson($response, $data, $statusCode);
            } catch (\Exception $e) {
                $data['msg'] = $e->getMessage();
                return $this->respondWithJson($response, $data, $statusCode);
            }
        }
        return $this->respondWithJson($response, ['success' => false, 'msg' => 'Unauthorized'], 401);
    }
}
