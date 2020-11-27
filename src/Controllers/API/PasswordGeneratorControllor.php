<?php


namespace Portal\Controllers\API;


class PasswordGeneratorControllor
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
     * @param array $args The arguments array

     *
     * @return string JSON message and status code.
     */
    public function __invoke(Request $request, Response $response, array $args) : Response
    {
        $data = ['success' => false, 'msg' => 'Incorrect email or password.', 'data' => []];


        return $this->respondWithJson($response, $data, $statusCode);
    }
}