<?php

namespace Portal\Controllers\API;

use Portal\Abstracts\Controller;
use Portal\Sanitisers\TrainerSanitiser;
use Portal\Validators\TrainerValidator;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Portal\Models\TrainerModel;

class EditTrainerController extends Controller
{
    private TrainerModel $trainerModel;

    public function __construct(TrainerModel $trainerModel)
    {
        $this->trainerModel = $trainerModel;
    }

    public function __invoke(Request $request, Response $response, array $args)
    {
        $editTrainer = $request->getParsedBody();

        $responseData = [
            'success' => false,
            'message' => 'Unexpected Error.',
            'data' => []
        ];
        $statusCode = 400;

        try {
            if (TrainerValidator::validate($editTrainer)) {
                $editTrainer = TrainerSanitiser::sanitise($editTrainer);
                $result = $this->trainerModel->editTrainer($editTrainer);
            }
        } catch (\Exception $exception) {
            $responseData['message'] = $exception->getMessage();
        }

        if (isset($result) && $result) {
            $responseData = [
                'success' => true,
                'message' => 'Trainer successfully updated.',
                'data' => []
            ];
            $statusCode = 200;
        }
        return $this->respondWithJson($response, $responseData, $statusCode);
    }
}
