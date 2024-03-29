<?php

namespace Portal\Controllers\API;

use Portal\Abstracts\Controller;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Portal\Models\ApplicationFormModel;
use Portal\Models\EventModel;

class GetApplicationFormController extends Controller
{
    private ApplicationFormModel $applicationFormModel;
    private EventModel $eventModel;

    /**
     * GetApplicationFormController constructor.
     */
    public function __construct(ApplicationFormModel $applicationFormModel, EventModel $eventModel)
    {
        $this->applicationFormModel = $applicationFormModel;
        $this->eventModel = $eventModel;
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
                        'cohorts' => $this->applicationFormModel->getCohorts(),
                        'hearAbout' => $this->applicationFormModel->getHearAbout(),
                        'gender' => $this->applicationFormModel->getGenders(),
                        'backgroundInfo' => $this->applicationFormModel->getBackgroundInfo(),
                        'tasters' => $this->eventModel->getEventsByCategoryId(3, 3),
                        'assessments' => $this->eventModel->getEventsByCategoryId(4, 60)
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
