<?php

namespace Portal\Controllers\API;

use Portal\Abstracts\Controller;
use Portal\Models\StageModel;
use Portal\Sanitisers\StageSanitiser;
use Portal\Validators\StageValidator;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class AddStageController extends Controller
{
    private $stageModel;

    /** Constructor assigns StageModel to this object
     *
     * AddStageController constructor.
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
            'message' => 'Unexpected Error.',
            'data' => []
        ];
        $statusCode = 500;

        if ($_SESSION['loggedIn'] === true) {
            if (StageValidator::validateNewStage($requestData)) {
                $requestData['order'] = $this->stageModel->getHighestOrderNo();
                $newStage = StageSanitiser::sanitise($requestData);
                $newStage['order']++;
                if ($this->stageModel->createStage($newStage)) {
                    $data = [
                        'success' => true,
                        'message' => 'Stage added successfully',
                        'data' => []
                    ];
                    $statusCode = 200;
                } else {
                    $data['message'] = 'Error adding to database';
                }
            } else {
                $statusCode = 400;
                $data['message'] = 'Incorrect data provided';
            }
            return $this->respondWithJson($response, $data, $statusCode);
        }
    }
}
