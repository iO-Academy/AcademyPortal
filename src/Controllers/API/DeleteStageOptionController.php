<?php

namespace Portal\Controllers\API;

use Portal\Abstracts\Controller;
use Portal\Models\StageModel;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class DeleteStageOptionController extends Controller
{
    private StageModel $stageModel;

    public function __construct(StageModel $stageModel)
    {
        $this->stageModel = $stageModel;
    }

    /**
     * Checks if user is logged in, validates the http request data and calls
     * the deleteOption method on stageModel
     */
    public function __invoke(Request $request, Response $response, array $args): Response
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
                $optionId = (int) $formOption['optionId'];
                $stageId = (int) $formOption['stageId'];
                $stageOptions = $this->stageModel->getOptionsByStageId($stageId);
                if (count($stageOptions) == 2) {
                    $data = [
                        'success' => true,
                        'msg' => 'Operation cannot leave stage with one option',
                        'data' => ''
                    ];
                    // status code 202 is used to indicate that the request was valid,
                    // but further logic needs to be run before the request can be
                    // fully resolved (in this case, the user needs either to
                    // cancel the request or to delete all options on the stage)
                    $statusCode = 202;
                    return $this->respondWithJson($response, $data, $statusCode);
                }

                $this->stageModel->deleteOption($optionId);
                $data = [
                    'success' => true,
                    'msg' => 'Option delete successful.',
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
