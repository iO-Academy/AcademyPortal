<?php

namespace Portal\Controllers\API;

use Portal\Abstracts\Controller;
use Portal\Models\ApplicantModel;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class LockApplicantFieldController extends Controller
{
    private ApplicantModel $model;

    /**
     * @param ApplicantModel $model
     */
    public function __construct(ApplicantModel $model)
    {
        $this->model = $model;
    }

    public function __invoke(Request $request, Response $response, $args)
    {
        $statusCode = 500;
        $responseData = [
            'success' => false,
            'message' => 'Unexpected error',
            'data' => []
        ];

        try {
            $data = $request->getQueryParams();
            $result = $this->model->toggleLockField($data['id'], $data['field']);

            if ($result) {
                $responseData = [
                    'success' => true,
                    'message' => 'Lock for ' . $data['field'] . ' field Successfully',
                    'data' => []
                ];
                $statusCode = 200;
            }
        } catch (\Exception $exception) {
            // uncomment next line when debugging model
            // $responseData['message'] = $exception->getMessage();
            // when not debugging do nothing, respond with nice error response
        }
        return $this->respondWithJson($response, $responseData, $statusCode);
    }
}
