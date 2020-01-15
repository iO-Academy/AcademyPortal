<?php

namespace Portal\Controllers;

use Portal\Models\UserModel;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class LoginController
{
    private $userModel;

    /**
     * Instantiates login controller.
     * LoginController constructor.
     *
     * @param UserModel $userModel userModel object dependency
     */
    public function __construct(UserModel $userModel)
    {
        $this->userModel = $userModel;
    }

    /**
     * Verifies user credentials then returns message and status code with login success status and attached message.
     *
     * @param Request $request HTTP request
     * @param Response $response HTTP response
     *
     * @return string JSON message and status code.
     */
    public function __invoke(Request $request, Response $response) : Response
    {
        $data = ['success' => false, 'msg' => 'Incorrect email or password.', 'data' => []];
        $statusCode = 401;
        $_SESSION['loggedIn'] = false;

        $parsedBody = $request->getParsedBody();

        $user = $this->userModel->getUserByEmail($parsedBody['userEmail']);
        $result = $this->userModel->userLoginVerify(
            $parsedBody['userEmail'],
            urldecode($parsedBody['password']),
            $user
        );

        if ($result) {
            $data['success'] = $result;
            $data['msg'] = 'Valid user';
            $_SESSION['loggedIn'] = true;
            $statusCode = 200;
        }

        $response->getBody()->write(json_encode($data));

        return $response->withStatus($statusCode);
    }
}
