<?php

namespace Portal\Controllers;

use Portal\Models\CohortModel;
use Slim\Http\Request;
use Slim\Http\Response;
use Portal\Models\ApplicationFormModel;

class ApplicationFormController
{
    private $applicationFormModel;
    private $cohortModel;

    /**
     * ApplicationFormController constructor.
     * 
     * @param ApplicationFormModel $applicationFormModel
     * @param CohortModel $cohortModel
     */
    function __construct(ApplicationFormModel $applicationFormModel, CohortModel $cohortModel)
    {   
        $this->applicationFormModel = $applicationFormModel;
        $this->cohortModel = $cohortModel;
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
    function __invoke(Request $request, Response $response, array $args)
    {
        if ($_SESSION['loggedIn'] === true) {
            $statusCode = 200;
            $data = [
                'success' => true, 
                'msg' => 'Retrieved dropdown info.', 
                'data' => [
                        'cohorts' => $this->cohortModel->getCohorts(),
                        'hearAbout' => $this->applicationFormModel->getHearAbout(),
                ]
            ];
            return $response->withJson($data, $statusCode);
        }
    }
}
