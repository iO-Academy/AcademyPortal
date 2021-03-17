<?php

namespace Portal\Controllers\API;

use Portal\Abstracts\Controller;
use Portal\Models\StageModel;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class DeleteAllStageOptionsController extends Controller
{
    private $stageModel;

    /** Constructor assigns StageModel to this object
    *
    * DeleteStageOptionController constructor.
    * @param StageModel $stageModel
    */
    public function __construct(StageModel $stageModel)
    {
        $this->stageModel = $stageModel;
    }

    /**
     * Checks if user is logged in, validates the http request data and calls
     * the deleteAllOptions method on stageModel
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
                'msg' => 'Option not found.',
                'data' => []
            ];
            $statusCode = 500;

            try {
                $formOption = $request->getParsedBody();
                $stageId = (int) $formOption['stageId'];

                $this->stageModel->deleteAllOptions($stageId);
                $data = [
                    'success' => true,
                    'msg' => 'All options deleted.',
                    'data' => ''
                ];
                $statusCode = 200;

                return $this->respondWithJson($response, $data, $statusCode);
            } catch (\Exception $e) {
                $data['msg'] = $e->getMessage();
                return $this->respondWithJson($response, $data, $statusCode);
            }
        }
        return $this->respondWithJson($response, ['success' => false, 'msg' => 'Unauthorised'], 401);
    }
}
