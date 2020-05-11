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
            $statusCode = 200;
            $data = [
                'success' => true,
                'msg' => 'Retrieved dropdown info.',
                'data' => [
                        'cohorts' => $this->applicationFormModel->getCohorts(),
                        'hearAbout' => $this->applicationFormModel->getHearAbout(),
                ]
            ];
            return $this->respondWithJson($response, $data, $statusCode);
        }
    }
}
