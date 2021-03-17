<?php

namespace Portal\Controllers\API;

use Portal\Abstracts\Controller;
use Portal\Models\UserModel;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class AddUserController extends Controller
{
    private $userModel;

    /**
     * Instantiates AddUserController.
     *
     * @param UserModel $userModel userModel object dependency
     */
    public function __construct(UserModel $userModel)
    {
        $this->userModel = $userModel;
    }

    /**
     * Validates username / email and updates database if email doesn't exist.
     *
     * @param Request $request HTTP request
     * @param Response $response HTTP response
     * @param array $args
     *
     * @return Response
     */
    public function __invoke(Request $request, Response $response, array $args)
    {
        if ($_SESSION['loggedIn'] === true) {
            $data = ['success' => false, 'msg' => 'User not registered.', 'data' => []];
            $statusCode = 401;

            $newUserData = $request->getParsedBody();
            $validatedUserData = [
                'email' => filter_var($newUserData['email'], FILTER_SANITIZE_EMAIL),
                'password' => $newUserData['password']
            ];
            $successfulRegister = $this->userModel->insertNewUserToDb(
                $validatedUserData['email'],
                password_hash($validatedUserData['password'], PASSWORD_DEFAULT)
            );

            if ($successfulRegister) {
                $data = [
                    'success' => $successfulRegister,
                    'msg' => "New user added email:' "
                        . $validatedUserData['email']
                        . " ' password:' "
                        . $validatedUserData['password']
                        . " '",
                    'data' => []
                ];
                $statusCode = 200;
            }

            return $this->respondWithJson($response, $data, $statusCode);
        }
    }
}
