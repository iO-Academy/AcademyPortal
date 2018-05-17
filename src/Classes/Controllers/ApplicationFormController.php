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
        

        

        // if ($_SESSION['loggedIn'] === true) {

            $cohorts = $this->applicationFormModel->getCohorts();
            $hearAbout = $this->applicationFormModel->getHearAbout();
        $statusCode = 200;
           $data = [
               'success' => true, 
               'msg' => 'Retrieved dropdown info.', 
               'data' => [
                    'cohorts' => $cohorts,
                    'hearAbout' => $hearAbout,
               ]
            ];
            echo '<pre>' . var_export($data, true) . '</pre>';

            return $response->withJson($data, $statusCode);
        // } 


        

        // $parsedBody = $request->getParsedBody();
        // $user = $this->userModel->getUserByEmail($parsedBody['userEmail']);
        // $result = $this->userModel->userLoginVerify($parsedBody['userEmail'], $parsedBody['password'], $user);

        // if($result) {
        //     $data['success'] = $result;
        //     $data['msg'] = 'Valid user';
        //     $_SESSION['loggedIn'] = true;
        //     $statusCode = 200;
        // }

        // return $response->withJson($data, $statusCode);
    }
}