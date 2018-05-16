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

    // get verified email (from where?) On invoke of this class?
    function __invoke(Request $request, Response $response, UserModel){

        $newUserData = $request->getParsedBody();
        $validatedUserData = [];
        $validatedUserData['email'] = filter_var($newUserData['email'], FILTER_SANITIZE_STRING);
        $validatedUserData['password'] = filter_var($newUserData['password'], FILTER_SANITIZE_STRING);

        $this->userModel->insertNewUserToDb($validatedUserData['email'], $validatedUserData['password']);
    }

}