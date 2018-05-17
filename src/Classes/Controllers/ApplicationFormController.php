<?php

namespace Portal\Controllers;

use Slim\Http\Request;
use Slim\Http\Response;
use Portal\Models\ApplicationFormModel;

class ApplicationFormController
{
    private $applicationFormModel;

    function __construct(ApplicationFormModel $applicationFormModel)
    {   
        $this->applicationFormModel = $applicationFormModel;
    }

    function __invoke(Request $request, Response $response, $args)
    {   
        //Line below is here for testing. Should be removed after code review!!!
        // $_SESSION['loggedIn'] = true; 
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

            return $response->withJson($data, $statusCode);
        } 
    }
}