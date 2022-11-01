<?php

namespace Portal\Controllers\API;

use Portal\Abstracts\Controller;
use Portal\Sanitisers\TrainerSanitiser;
use Portal\Validators\TrainerValidator;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Portal\Models\TrainerModel;

class AddTrainerController extends Controller
{
    private $trainerModel;

    /**
     * AddTrainerController constructor
     *
     * @param TrainerModel $courseModel
     */
    public function __construct(TrainerModel $trainerModel)
    {
        $this->trainerModel = $trainerModel;
    }

    /**
     * Get user input and send to TrainerModel to add to db.
     *
     * @param Request  $request
     * @param Response $response
     * @param array    $args
     *
     * @return Response
     */
    public function __invoke(Request $request, Response $response, array $args): Response
    {
        $newTrainer = $request->getParsedBody();

        $responseData = [
            'success' => false,
            'message' => 'Unexpected Error.',
            'data' => []
        ];
        $statusCode = 400;

        try {
            if (TrainerValidator::validate($newTrainer)) {
                $newTrainer = TrainerSanitiser::sanitise($newTrainer);
                $result = $this->trainerModel->addNewTrainer($newTrainer);
            }
        } catch (\Exception $exception) {
            $responseData['message'] = $exception->getMessage();
        }

        if (isset($result) && $result) {
            $responseData = [
                'success' => true,
                'message' => 'New Trainer successfully saved.',
                'data' => []
            ];
            $statusCode = 200;
        }
        return $this->respondWithJson($response, $responseData, $statusCode);
    }
}
