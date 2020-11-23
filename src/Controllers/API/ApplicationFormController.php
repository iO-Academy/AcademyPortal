<?php

namespace Portal\Controllers;

use Portal\Abstracts\Controller;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Portal\Models\ApplicationFormModel;

class ApplicationFormController extends Controller
{
    private $applicationFormModel;

    /**
     * ApplicationFormController constructor.
     *
     * @param ApplicationFormModel $applicationFormModel
     */
    public function __construct(ApplicationFormModel $applicationFormModel)
    {
        $this->applicationFormModel = $applicationFormModel;
    }

    /**
     * Defines the default behaviour of Class when treated as a method.
     * Retrieves options for drop down menus in application form.
     *
     * @param Request $request
     * @param Response $response
     * @param array $args
     *
     * @return Response, carry through data and statusCode.
     */
    public function __invoke(Request $request, Response $response, array $args)
    {
        if ($_SESSION['loggedIn'] === true) {
            try {
                $statusCode = 200;
                $data = [
                    'success' => true,
                    'message' => 'Retrieved dropdown info.',
                    'data' => [
                        'cohorts' => $this->applicationFormModel->getCohorts(),
                        'hearAbout' => $this->applicationFormModel->getHearAbout(),
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
