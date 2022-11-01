<?php

namespace Portal\Controllers\API;

use Portal\Abstracts\Controller;
use Portal\Models\ApplicationFormModel;
use Portal\Models\EventModel;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class GetGenderController extends Controller
{
    private ApplicationFormModel $applicationFormModel;

    public function __construct(ApplicationFormModel $applicationFormModel)
    {
        $this->applicationFormModel = $applicationFormModel;
    }

    /**
     * Defines the default behaviour of Class when treated as a method.
     * Retrieves options for drop down menus in application form.
     */
    public function __invoke(Request $request, Response $response, array $args): Response
    {
        if ($_SESSION['loggedIn'] === true) {
            try {
                $statusCode = 200;
                $data = [
                    'success' => true,
                    'message' => 'Retrieved dropdown info.',
                    'data' => [
                        'stages' => $this->applicationFormModel->getGenders()

                    ]
                ];
            } catch (\Exception $e) {
                $statusCode = 500;
                $data['success'] = false;
                $data['message'] = $e->getMessage();
                $data['data'] = [];
            }
            return $this->respondWithJson($response, $data, $statusCode);
        }

        $_SESSION['loggedIn'] = false;
        $data = ['success' => false, 'message' => 'Unauthorized', 'data' => []];
        return $this->respondWithJson($response, $data, 401);
    }
}
