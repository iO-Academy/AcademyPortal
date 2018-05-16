<?php
/**
 * Created by PhpStorm.
 * User: academy
 * Date: 15/05/2018
 * Time: 16:37
 */

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
            $validatedUserData = [];
            $validatedUserData['email'] = filter_var($newUserData['email'], FILTER_SANITIZE_STRING);
            $validatedUserData['password'] = filter_var($newUserData['password'], FILTER_SANITIZE_STRING);

            //returns true if exists - we want it to return false to continue adding new user
            $emailExists = $this->userModel->getUserByEmail($validatedUserData['email']);

            if (!$emailExists) {
                $result = $this->userModel->insertNewUserToDb($validatedUserData['email'], $validatedUserData['password']);
            }

            if ($result) {
                $data['success'] = $result;
                $data['msg'] = 'User registered';
                $statusCode = 200;
            }
            return $response->withJson($data, $statusCode);

        }
    }
}