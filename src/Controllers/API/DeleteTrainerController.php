<?php

namespace Portal\Controllers\API;

use Portal\Abstracts\Controller;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Portal\Models\TrainerModel;

class DeleteTrainerController extends Controller
{
    private TrainerModel $trainerModel;

    public function __construct(TrainerModel $trainerModel)
    {
        $this->trainerModel = $trainerModel;
    }

    /**
     * Checks if user is logged in, validates the http request data and calls
     * the delete method on TrainerModel
     */
    public function __invoke(Request $request, Response $response, array $args): Response
    {
        if ($_SESSION['loggedIn'] === true) {
            $data = [
                'success' => false,
                'message' => 'Trainer not found.',
                'data' => []
            ];
            $statusCode = 500;

            $requestData = $request->getParsedBody();

            if (isset($requestData['id']) && filter_var($requestData['id'], FILTER_VALIDATE_INT)) {
                $trainerData = $this->trainerModel->getTrainerById($requestData['id']);
                if ($trainerData) {
                    if ($this->trainerModel->deleteTrainer($requestData['id'])) {
                        $data = [
                            'success' => true,
                            'message' => 'Trainer has been deleted successfully.',
                            'data' => []
                        ];
                        $statusCode = 200;
                    } else {
                        $data['message'] = 'Unexpected error, could not delete trainer';
                    }
                }
            } else {
                $data = [
                    'success' => false,
                    'message' => 'Invalid id provided.',
                    'data' => []
                ];
            }
            return $this->respondWithJson($response, $data, $statusCode);
        }
    }
}
