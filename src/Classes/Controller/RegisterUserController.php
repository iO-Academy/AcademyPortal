<?php

namespace Portal\Controller;

use Portal\Models\UserModel;
use Slim\Http\Request;
use Slim\Http\Response;

class RegisterUserController
{
    private $userModel;

    /**
     * Instantiates RegisterUserController
     *
     * @param UserModel $userModel userModel object dependency
     */
    public function __construct(UserModel $userModel)
    {
        $this->userModel = $userModel;
    }

    /**
     * Validates username / email and updates database if email doesn't exist
     *
     * @param Request $request HTTP request
     * @param Response $response HTTP response
     *
     * @return error/success message and status code
     */
    function __invoke(Request $request, Response $response){

        if ($_SESSION['loggedIn'] === true) {

            $data = ['success' => false, 'msg' => 'User not registered.', 'data' => []];
            $statusCode = 401;

            $newUserData = $request->getParsedBody();
            $validatedUserData = [
                'email' => filter_var($newUserData['email'], FILTER_SANITIZE_STRING),
                'password' => filter_var($newUserData['password'], FILTER_SANITIZE_STRING)
            ];

            $successfulRegister = $this->userModel->insertNewUserToDb($validatedUserData['email'], $validatedUserData['password']);

            if ($successfulRegister) {
                $data = [
                    'success' => $successfulRegister,
                    'msg' => 'User registered',
                    'data' => []
                ];
                $statusCode = 200;
            }
            return $response->withJson($data, $statusCode);

        }
    }
}